<?php

$url= 'http://loscuatros.com:8085/servicio/consultar/52821585';
$url2= file_get_contents($url);
$urlArray= json_decode($url2,true); 

var_dump($urlArray)

?>