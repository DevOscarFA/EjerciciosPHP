<?php
//Se muestran todos los errores
error_reporting(E_ALL);
ini_set('display_errors', '1');
//Se instancia la libreria
require_once "./library/nusoap.php";

/**
 * Funcion suma 
 * 
 * @param type $array
 * @return string
 */
function sum($array =  null) {
    if($array ==  null){
        return "No ha enviado parametros";
    }
    $total = 0;
    foreach ($array as $row){
        $total += $row;
    }
    return $total;
}

//Se crea el servidor
$server = new soap_server();
$ns = "urn:matematicas";
$server->configureWSDL("Matematicas", $ns);


$server->register("sum",
    array("arrayNumber" => "xsd:array"),
    array("return" => "xsd:string"),
    $ns);

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '' ;

$server->service($HTTP_RAW_POST_DATA);