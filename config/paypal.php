<?php

return array(
/** set your paypal credential **/
'client_id' =>'AfQhii6Pqek8WLc0CLPWRE8I8vQyvTLvSp4ooXSCC0bmyCESS2zoIH94Fh78XeFaiqs9HmC0Jcl6ZuzX',
'secret' => 'ECpIhbam753EV-CkXfKqlKjo-jMYQkgfiwtTzxeJ5WaY689OeRS1jpGOVlaXsNNvLauZNzEjKNHVUowJ',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);