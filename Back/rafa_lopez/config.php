<?php
if (!defined('DEV')) {

    // entorno desarrollo
    define('DEV', true);
    // condifuracion servidor bd
    define('SERVER', 'localhost:3308');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'resto_nocountry');
}
function debug($debug)
{
    if (DEV) {
        echo '<pre>';
        print_r($debug);
        echo '</pre>';
    }
}
/* VERIFICADO mesas PERMITIDAS */
define('MESAS', array(1, 2, 3, 4, 5, 6, 7, 8, 9));
/* FORMATO PETICION:  /CONTROLADOR/ACCION/ID*/
define('CONTROLLER', array('ADMIN',  'CLIENTE', 'COCINA', 'MESA', 'MOZO', 'LOGIN'));
define('MODEL', array('NUEVO', 'PEDIDO', 'VER', 'PAGAR', 'CERRAR', 'LISTAR'));
