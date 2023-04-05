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
        break;/*
    case 'agregar':
        //Ejecutamos el controlador de agregar producto cuando recibimos el formulario
        $control->agregar_producto();
        break;
    case 'mostrar':
        //mostramos un producto en particular y para esto el GET tiene que venir tanto con el valor del accion como con el id del producto que desean que muestre: ?accion=mostrarid&id=<id_producto>
        $control->mostrar_productos();
        break;
    case 'editar':
        //mostramos un producto en particular y para esto el GET tiene que venir tanto con el valor del accion como con el id del producto que desean que muestre: ?accion=mostrarid&id=<id_producto>
        $control->editar_producto($_GET['id']);
        break;
    case 'borrar':
        //mostramos un producto en particular y para esto el GET tiene que venir tanto con el valor del accion como con el id del producto que desean que muestre: ?accion=mostrarid&id=<id_producto>
        $control->borrar_producto($_GET['id']);
        break;*/

    //Dejamos por defecto la vista del menú
    default:
        header('Location: ../publico/servicio.php');    
        break;
}
?>
