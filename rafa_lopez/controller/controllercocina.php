<?php
require_once('./model/modelcocina.php');
$data = array("TITULO" => 'Resto NoCountry',"SUB TITULO" => 'Prueba MVC con renderizado');
echo $app->render('vistacocina', $data, false);
