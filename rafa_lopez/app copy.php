<?php

require_once('config.php');
require_once('./controller/controllerapp.php');
$app = new ControllerApp();
$app->conectarBD();
$app->setProductos();
$app->setRuta();
$app->respuesta($app->getRuta());
$app->desconectarDB();
