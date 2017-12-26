<?php
/**
 * Class to fetch stock data from Yahoo! Finance
 *
 */
 
class YahooStock {
    
    /**
     * Array of stock code
     */
    private $stocks = array();
    
    /**
     * Parameters string to be fetched     
     */
    private $format;
 
    /**
     * Populate stock array with stock code
     *
     * @param string $stock Stock code of company    
     * @return void
     */
    public function addStock($stock)
    {
        $this->stocks[] = $stock;
    }
    
    /**
     * Populate parameters/format to be fetched
     *
     * @param string $param Parameters/Format to be fetched
     * @return void
     */
    public function addFormat($format)
    {
        $this->format = $format;
    }

	
    /**
     * Get Stock Data
     *
     * @return array
     */
	 
    public function getQuotes()
    {        
        $result = array();        
        $format = $this->format;
        
        foreach ($this->stocks as $stock)
        {            
            /**
             * fetch data from Yahoo!
             * s = stock code
             * f = format
             * e = filetype
             */
			  
			 $today = strtotime(date("Y-m-d H:i:s"));
			 $todayD = date("n,j,Y",$today);
			 $tArr = explode(',', $todayD);
			 $fourteen =  $today - 1382400;
			 $fourteenD =  date("n,j,Y",$fourteen);
			  $fArr = explode(',',$fourteenD);
			 
			 
			 $filename = "csv/$stock".'_'."$format";
			 $filename2 = "img/$stock";
			 $filename3 = "csv/$stock".'_'."$fourteenD.csv";
			 
			 $a = $fArr[0] - 1;  //Months is 0 -11
			 $b = $fArr[1] - 1; //for previous day 
			 $c = $fArr[2];
			 $d = $tArr[0] - 1; //Months is 0 -11
			 $e = $tArr[1];
			 $f = $tArr[2];
			 
			/***
			if (!file_exists($filename3) || filesize($filename3) <= 0){
				 
				 
				 $a = @file_get_contents("http://ichart.yahoo.com/table.csv?s=$stock&a=$a&b=$b&c=$c&d=$d&e=$e&f=$f&g=d&ignore=.csv");
				 	
					$ap = fopen($filename3, 'w'); 
			// save the contents of output buffer to the file
			fwrite($ap, $a);
			 }
			 
			 
			 $bt = file_get_contents("$filename3");
		  
			  $dt = str_getcsv($bt,",",'"');
			  
			  //highest in 14 days
			  $highest = 0;
			  for ($i = 8, $c = count($dt); $i < $c; $i += 6){if ($dt[$i] > $highest){$highest = $dt[$i];}}
			 $h = $highest;
			  
			  //lowest in 14 days
			  $lowest = $dt[9];
			   for ($i = 9, $c = count($dt); $i < $c; $i += 6){if ($dt[$i] < $lowest){$lowest = $dt[$i];}}
			  $l = $lowest;
			  **/
			 
			 if (!file_exists($filename) || filesize($filename) <= 0){
				 $s = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=$format&e=.csv");
				 	$fp = fopen($filename, 'w'); 
			// save the contents of output buffer to the file
			fwrite($fp, $s);
			 }
    
	
	if (!file_exists($filename2) || filesize($filename2) <= 0){
				 $b = file_get_contents("http://chart.finance.yahoo.com/z?s=$stock");
				 	$bp = fopen($filename2, 'w'); 
			// save the contents of output buffer to the fil
			fwrite($bp, $b);
			 }
	
	
	
   
            /** 
             * convert the comma separated data into array
             */
		  $b = file_get_contents("$filename");
		  
            $data = str_getcsv($b,",",'"');
			
			 @array_push($data,$h,$l);
            
            /** 3
             * populate result array with stock code as key
             */
            $result[$stock] = $data;
        }
		 
        return $result;
    }
	
	
	Public Function store()
		{
			$cachefile = $this->cache_filename();
			
			// open the cache file "cache/home.html" for writing
			$fp = fopen($cachefile, 'w'); 
			// save the contents of output buffer to the file
			fwrite($fp, ob_get_contents()); 
			// close the file
			fclose($fp); 
			// Send the output to the browser
			ob_end_flush(); 				
		}
		
	
public function reDl1()
    {        
	    $dir    = 'csv';
        $files = scandir($dir);
		foreach ($files as $f)
        {
			if (preg_match("/([a-zA-Z0-9.]+)_(\S+)[^.csv]$/", $f, $r) == 1){
			$stock = $r[1];
			$format = $r[2];
		$filename = "csv/$stock".'_'."$format";
			if (filesize($filename) <= 0){
				echo $stock;
				echo $format;
				 $s = file_get_contents("http://finance.yahoo.com/d/quotes.csv?s=$stock&f=$format&e=.csv");
				 	$fp = fopen($filename, 'w'); 
			// save the contents of output buffer to the file
			fwrite($fp, $s);
			 }
    
	
        }
		
		}

			
		}


	
public function reDl2()
    {        
	    $dir    = 'csv';
        $files = scandir($dir);
		
		foreach ($files as $f)
        {
			preg_match("/([a-zA-Z0-9.]+)_(\S+).csv$/", $f, $r);
			$stock = $r[1];
			 $today = strtotime(date("Y-m-d H:i:s"));
			 $todayD = date("n,j,Y",$today);
			 $tArr = explode(',', $todayD);
			 $fourteen =  $today - 1382400;
			 $fourteenD =  date("n,j,Y",$fourteen);
			  $fArr = explode(',',$fourteenD);
			$filename3 = "csv/$stock".'_'."$fourteenD.csv";
			 $a = $fArr[0] - 1;  //Months is 0 -11
			 $b = $fArr[1] - 1; //for previous day 
			 $c = $fArr[2];
			 $d = $tArr[0] - 1; //Months is 0 -11
			 $e = $tArr[1];
			 $f = $tArr[2];
			if (filesize($filename3) <= 0){	 
				 $a = file_get_contents("http://ichart.yahoo.com/table.csv?s=$stock&a=$a&b=$b&c=$c&d=$d&e=$e&f=$f&g=d&ignore=.csv");
				 	
					$ap = fopen($filename3, 'w'); 
			// save the contents of output buffer to the file
			fwrite($ap, $a);
			 }
        }

		}
		
     
	

public function reDl3()
    {        
	    $dir    = 'img';
        $files = scandir($dir);
		
		foreach ($files as $f)
        {
			$stock = $f;
			$filename2 = "img/$stock";
			 
			 
			if (filesize($filename2) <= 0){
				 $b = file_get_contents("http://chart.finance.yahoo.com/z?s=$stock");
				 	$bp = fopen($filename2, 'w'); 
			// save the contents of output buffer to the file
			fwrite($bp, $b);
			 }
    
	echo $filename2.'<br>';
        }

			
		}
	





	
} 