# finwall

## This script is used for reading and analysing stock market data. It gathers data from a remote source like Yahoo Finance, analyses the data and pick the most probable stocks for short to medium-term trading.


## INSTALLATION

Installing this script is pretty easy. 

1) Download the Whole Repository as a zip
2) Then copy the file to your local or Production directory
3) Afterwards you will need to set the following files on crons job to feed the script with data: 
    redl1.php redl2.php redl3.php
    
    Setting a cron job time of 10 minutes is fine depending on your data source and realtime duration. For yahoo stcok , it wa 15 minutes, so 10 minutes felt good.
    
  At the time of coding the Script, the Yahoo Finace Free Api was available. But it's now restricted. So I suggest you change the api class with a paid stock data terminal or a free one if its reliable.
  
  To change this , just check all these functions in the class.yahoostock.php.
  
  redl1() ***(daily stock data feeds)***
  redl2()  ***(Historical Data)****
  redl3()   ***(chart feeds)***   
  
  These functions control the data feed in the  corresponding cron jobs.

feel free contact me for any installation help. (jegedeakintunde[at]gmail.com)
