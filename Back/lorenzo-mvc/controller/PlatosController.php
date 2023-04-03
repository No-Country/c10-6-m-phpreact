<?php
require('model/Platos.php');

$Platos = new Platos();

$productos = $Platos->getProducto();

require('view/moso.php');
?>