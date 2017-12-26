<?php include_once('class.yahoostock.php');
$objYahooStock = new YahooStock;
$objYahooStock->addFormat("snl1p2vpm3m4"); 
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
 
$BD = 0;
foreach( $objYahooStock->getQuotes() as $code => $stock)
{	$tC = $stock[5];
	$tH = $stock[8];
	$tL = $stock[9];
	$tcl = $tC-$tL;
	$thl = $tH-$tL;
	$tst=$tcl/$thl;
	$tsti = floor($tst*100);
	
	if ($tsti >= 80){$tBuy = 0;}
	else if ($tsti <= 20 ){ $tBuy = 0;}
	else if ($stock[2] <  $stock[6] ){$BD += $stock[6]-$stock[2];}
}

$myfile = fopen("bd.txt", "w");
$txt = trim($BD);
fwrite($myfile, $txt);
fclose($myfile);
?>