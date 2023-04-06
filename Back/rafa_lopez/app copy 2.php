<?php
require_once('config.php');
require_once('./controller/controllerapp.php');
$app = new ControllerApp();
require_once('./controller/controller' . $app->getRuta()['controller'] . '.php');
$controlador = ucfirst('controller') . ucfirst($app->getRuta()['controller']) . '()';
$control = new ControllerCliente();
//
//$app->getProducto();
debug($app);
$app = null;
