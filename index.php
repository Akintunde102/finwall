<?php include('header.php');
$objYahooStock->addFormat("snl1p2vpm3m4"); //Symbol, Name,last trade price, % change, volume, previous close, 50 day moving average, 200 day moving average
$objYahooStock->addStock("FB"); 
$objYahooStock->addStock("QQQ"); 
$objYahooStock->addStock("AMZN"); 
$objYahooStock->addStock("SPLK"); 
$objYahooStock->addStock("OCLR"); 
$objYahooStock->addStock("JUNO"); 
$objYahooStock->addStock("GLD"); 
$objYahooStock->addStock("BAC"); 
$objYahooStock->addStock("AAPL"); 
$objYahooStock->addStock("GOOG"); 
$objYahooStock->addStock("STM"); 
$objYahooStock->addStock("IBM"); 
$objYahooStock->addStock("ALK"); 
$objYahooStock->addStock("DRYS"); 
$objYahooStock->addStock("MSFT"); 
$objYahooStock->addStock("EKSO"); 
$objYahooStock->addStock("IRBT"); 
$objYahooStock->addStock("HIMX"); 
$objYahooStock->addStock("SNAP"); 
$objYahooStock->addStock("CARA"); 
$objYahooStock->addStock("TSLA"); 
$objYahooStock->addStock("TEVA"); 
$objYahooStock->addStock("AMD"); 
$objYahooStock->addStock("NVDA"); 
$objYahooStock->addStock("FIZZ"); 
$objYahooStock->addStock("TRR"); 
$objYahooStock->addStock("FOMX"); 
$objYahooStock->addStock("DEPO");
 ?>
        <div id="body-container">
            <div id="body-content">
  
        <section class="page container">
            <div class="row">
                <div class="span2">
                    <div class="blockoff-right">
                        <ul id="person-list" class="nav nav-list">
                            <li class="nav-header">Stocks</li>
                            <li class="active">
                                <a href="#Person-1">
                                    <i class="icon-chevron-right pull-right"></i>
                                    <b>View All</b>
                                </a>
                            </li>
                            
							<?php $a = 1;
							foreach( $objYahooStock->getQuotes() as $code => $stock)
{ $a++; ?>
                                <li>
                                    <a href="#Person-<?php echo $a;?>">
                                        <i class="icon-chevron-right pull-right"></i>
                                       <?php echo $stock[0]; ?>
                                    </a>
                                </li>
<?php }?>
                            
                        </ul>
                    </div>
                </div>
                <div class="span14">


                    <div id="Person-1" class="box">
                        <div class="box-header">
                            <i class="icon-user icon-large"></i>
                            <h5>Featured Stocks</h5>
                            
                        </div>
                        <div class="box-content box-table">
                        <table class="table table-hover tablesorter">
                            <thead>
                                <tr>
                                    <th>Ticker Symbol</th>
<th>Name</th>
<th>Last Trade Price</th>
<th>%Change</th>
<th>Volume</th>
<th>50 day Moving Average</th>
<th>200 Day Moving Average</th>
<th>Stochastic Index</th>
<th>Signal</th>
<th>Buy Signal</th>
<th>Action</th>
                                    
                                </tr>
                            </thead>
                           
    <tbody>                        
      						<?php
$BD = trim(file_get_contents("bd.txt"));

	
$b = 1;								
foreach( $objYahooStock->getQuotes() as $code => $stock)
{$b++;
	$C = $stock[5];
	$H = $stock[8];
	$L = $stock[9];
	$cl = $C-$L;
	$hl = $H-$L;
	@$st=$cl/$hl;
	$sti = floor($st*100);
	$BuyD = ($stock[6]-$stock[2])*100/$BD;
	
	if ($sti >= 80){$comment = 'Overbought'; $Buy = 0; $style=""; }
	else if ($sti <= 20 ){$comment = 'Oversold'; $Buy = 0; $style="";  }
	else if ($stock[2] <  $stock[6] ){$comment = 'Good To buy'; $style=' style=\'background-color: orange;border-color:black;\''; $Buy = floor($BuyD);}
	else if ($stock[6] >  $stock[7] ){$comment = 'Not Good To Buy,Falling'; $style="";  $Buy = 0;}
	
echo '<tr'.$style.'>';	?>
                                    <td><?php echo $stock[0]; ?> </td>
    <td><?php echo $stock[1]; ?> </td>
    <td><?php echo $stock[2]; ?> </td>
    <td><?php echo $stock[3]; ?> </td>
     <td><?php echo $stock[4]; ?> </td>
      <td><?php echo $stock[6]; ?> </td>
      <td><?php echo $stock[7]; ?> </td>
      <td><?php echo $sti; ?> </td>
      <td><?php echo $comment; ?></td>
      <td><?php echo $Buy.'%'; ?> </td>
      <td> [<a href="search.php?q=<?=$stock[0]?>">More Details</a>] </td>
	   </tr> 
<?php } ?>
         </tbody>                           
                               
                         
                        </table>
                        </div>

                    </div>
                              
							   <?php							   
$a = 1;
foreach( $objYahooStock->getQuotes() as $code => $stock)
{ $a++;
echo '<div id="Person-'.$a.'" class="box">';
	$C = $stock[5];
	$H = $stock[8];
	$L = $stock[9];
	$cl = $C-$L;
	$hl = $H-$L;
	@$st=$cl/$hl;
	$sti = floor($st*100);
	$BuyD = ($stock[6]-$stock[2])*100/$BD;
	
	
	if ($sti >= 80){$comment = 'Overbought'; $Buy = 0;}
	else if ($sti <= 20 ){$comment = 'Oversold'; $Buy = 0;}
	else if ($stock[2] <  $stock[6] ){$comment = 'Good To buy'; $Buy = floor($BuyD);}
	else if ($stock[6] >  $stock[7] ){$comment = 'Not Good Buy,Falling'; $Buy = 0;}
	else {$comment = 'Normal';} ?>
	 
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