<?php
require_once('mesaModel.php');
$mesas = new MesaModel;


if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'mostrar';
}

//con Switch buscamos el tipo de acción y ejecutamos la adecuada
switch ($accion) {
    case 'cerrar':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mesa = $mesas->obtenerMesa($id);
            $mesas->actualizarMesa($id, 1, $mesa['qr']);
            header('Location: ../publico/servicio.php');
        } else {
            header('Location: ../publico/servicio.php');
        }
        break;
    default:
        header('Location: ../publico/servicio.php');    
        break;
}
?>
