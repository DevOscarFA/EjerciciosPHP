<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "./library/nusoap.php";

$client = new nusoap_client("http://192.168.0.9:8181/ejerciciosPHP/soap/server.php", false);
$err = $client->getError(); 

if($err){ 
    echo $err; 
} 

$arrayNumber = array(
    1,2,3,4,5
);

$parameter =  array('arrayNumber'=>$arrayNumber);

$result = $client->call('sum',$parameter);

if ($client->fault) { 
    echo 'Fault'. print_r($result); 
} else { 
    // Check for errors 
    $err = $client->getError(); 
    if ($err) { 
        // Display the error 
        echo 'Error'. $err; 
    } else { 
        // Display the result 
        print_r($result);   
    } 
} 