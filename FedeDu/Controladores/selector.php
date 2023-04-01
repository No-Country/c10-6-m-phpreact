<?php

require_once 'ProductoController.php';
$control = new ProductoController;

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'mostrar';
}

switch ($accion) {
    case 'mostrarid':
        $control->mostrar_producto($_GET['id']);
        break;
    case 'agregar':
        $control->agregar_producto();
        break;
    // Agregar aquí más casos según las acciones que necesites
    default:
        $control->mostrar_productos();
        break;
}

?>