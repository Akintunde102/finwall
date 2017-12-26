<?php include('header.php'); 


 $q = trim(ucwords($_GET['q']));
$objYahooStock->addFormat("snl1p2vpm3m4"); 
$objYahooStock->addStock($q);
if (@$objYahooStock->getQuotes()["$q"][1] == 'N/A'){header("Location: 404.html"); }





  
  ?>
        <div id="body-container">
            <div id="body-content">
  
        <section class="page container">
            <div class="row">
                <div class="span2">
                    <div class="blockoff-right">
                        <ul id="person-list" class="nav nav-list">
                            <li class="nav-header">Stocks</li>
							<?php $a = 1;
							foreach( $objYahooStock->getQuotes() as $code => $stock)
{ $a++; ?>
                                <li class="active">
                                    <a href="search.php?q=<?php echo $stock[0]; ?>">
                                        <i class="icon-chevron-right pull-right"></i>
                                       <?php echo $stock[0]; ?>
                                    </a>
                                </li>
<?php }?>   
                        </ul>
                    </div>
                </div>
                <div class="span14">

						   <?php 
						   $BD = trim(file_get_contents("bd.txt"));

	
$a = 1;
foreach( @$objYahooStock->getQuotes() as $code => $stock)
{ $a++;
echo '<div id="Person-'.$a.'" class="box">';
	if ($stock[1] != 'N/A'){
	$C = $stock[5];
	$H = $stock[8];
	$L = $stock[9];
	$cl = $C-$L;
	$hl = $H-$L;
	$st=$cl/$hl;
	$sti = floor($st*100);
$BuyD = ($stock[6]-$stock[2])*100/$BD;
	
	if ($sti >= 80){$comment = 'Overbought'; $Buy = 0;}
	else if ($sti <= 20 ){$comment = 'Oversold'; $Buy = 0;}
	else if ($stock[2] <  $stock[6] ){$comment = 'Good To buy'; $Buy = floor($BuyD);}
	else if ($stock[6] >  $stock[7] ){$comment = 'Not to Good Buy,Falling'; $Buy = 0;}
	else {$comment = 'Normal';} 
	

	
	
	
	
	
	
	}
else {echo 'Stock Ticker Does not Exist';}	?>
	 
	 <div class="box-header">
                            <i class="icon-user icon-large"></i>
                            <h5>[<?php echo $stock[0]; ?> ]  <?php echo $stock[1]; ?> </h5>
                            
                        </div>
                        <div class="box-content">
						<div class="row">
						<img src="img/<?php echo $stock[0]; ?> " class="span9" />
						<div class="span4" style="font-size: 15px;">
			<span style="margin: 4 0 4 0;">			<strong>Ticker Name:</strong>  <?php echo $stock[0]; ?> <br/> </span>	
  <span style="margin: 10px 0 10px 0">	 <strong> Name: </strong><?php echo $stock[1]; ?>  <br/> </span>	
  <span style="margin: 4 0 4 0;">	<strong> Last Trade Price:</strong>  <?php echo $stock[2]; ?>  <br/> </span>	
  <span style="margin: 4 0 4 0;">	  <strong>%Change :</strong> <?php echo $stock[3]; ?>  <br/> </span>	
  <span style="margin: 4 0 4 0;">	 <strong>  Volume :</strong> <?php echo $stock[4]; ?> <br/> </span>	
  <span style="margin: 4 0 4 0;">	  <strong>50 day Moving Average:</strong> <?php echo $stock[6]; ?> <br/> </span>	
  <span style="margin: 4 0 4 0;">	 <strong>   200 day Moving Average:</strong> <?php echo $stock[7]; ?>  <br/> </span>	
   <span style="margin: 4 0 4 0;">	 <strong>  Stochastic Index:</strong> <?php echo $sti; ?>  <br/> </span>	
   <span style="margin: 4 0 4 0;">	 <strong>  Buy Signal: </strong><?php echo $Buy.'%'; ?> <br/> </span>	
   <span style="margin: 4 0 4 0;">	 <strong>  Signal: </strong><?php echo $comment; ?> <br/> </span>	
</div>	  
</div>	  
                        </div>

	 </div>
	 
                                   
<?php } ?>
							   
							   
                        
                    
                     
                  
                </div>
            </div>
        </section>
        
    
            </div>
        </div>
<?php include('footer.php'); ?>