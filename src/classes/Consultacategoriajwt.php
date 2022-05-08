<?php 
// Dominio
$server = 'setestes.amaggi.com.br';

//Local WSDL File (in this sample we are using SE Administration WebService)

$module     = "/se/ws/dc_ws.php";

//URL to download a remote WSDL

$wsdl     = 'https://'.$server.$module.'?wsdl';


//endpoint to connect

$location = 'https://'.$server.'/apigateway'.$module;

//JWT
$token = "eyJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTIwNDkzNzQsImV4cCI6MTc2NzIyNTU0MCwiaWRsb2dpbiI6InBhYmxvLmFsdmVzIiwicmF0ZWxpbWl0IjoxMjAsInF1b3RhbGltaXQiOjEwMDAwMH0.VnXl3W31D2btGSHla4sQ1p_GridpBxdn4QJ9iynNb4Q";

// Instancia um cliente SOAP JWT
$context = array(

    'http' => array(
 
        'header' => 'Authorization: '.$token

    ));
 

 $client = new SoapClient($wsdl, array(

    "trace" => 1, // enable trace
   
    "exceptions" => 1, // enable exceptions
   
    "stream_context" => stream_context_create($context),
   
    "location" => $location
   
   ));

$return = $client->searchCategory(array(
          'CDCATEGORY' => 195,
          'CDCATEGORYOWNER' => 0,
          'IDCATEGORY' => 'AGR',
          'NMCATEGORY' => 'AMAGGI AGRO'
   ));

   echo json_encode($return);





