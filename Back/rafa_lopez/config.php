<?php
if (!defined('DEV')) {
    // entorno desarrollo
    define('TEST', true);
    define('DEV', true);
    // condifuracion servidor bd
    define('SERVER', 'localhost:3308');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'resto_nocountry');
    session_start();
}
function debug($debug)
{
    if (DEV) {
        echo '<pre>';
        //print_r($debug);
        var_dump($debug);
        echo '</pre>';
    }
}

/* VERIFICADO mesas PERMITIDAS */
define('MESAS', array(1, 2, 3, 4, 5, 6, 7, 8, 9));
/* FORMATO PETICION:  /CONTROLADOR/ACCION/ID*/

define('VERSION', array('V1'));
define('CONTROLLER', array('ADMIN',  'CLIENTE', 'COCINA', 'MESA', 'MOZO', 'LOGIN', 'LOGOUT'));
define('MODEL', array('PRODUCTOS', 'PRODUCTO', 'NUEVO', 'PEDIDOS', 'PEDIDO', 'VER', 'PAGAR', 'CERRAR', 'LISTAR', 'ANULAR', 'EDITAR', 'LOGIN'));
