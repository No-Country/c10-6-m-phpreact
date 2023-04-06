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
/**
 *  FORMATO PETICION:  /CONTROLADOR/ACCION/ID
 * contorladores : roles deusuario
 * ADMIN: dueño /gerente
 * MESA: cliente 
 * 
 */
define('CONTROLADOR', array('ADMIN', 'MESA', 'MOZO', 'COCINA'));
/**
 * admin
 * -> ver: pedidos, caja, pendientes
 * -> cerrar:pedido, caja
 * -> nuevo: menu/pedido
 * -> pagar: cobra un pedido
 * MESA:
 * -> ver: pedidos de la mesa
 * -> nuevo: hacer pedido
 * -> pagar: LLAMA AL MOZO ( puede serpo rqueja o para pagar)
 *  mozo:
 * -> ver: pedidos, caja, pendientes
 * -> cerrar: pedido, caja
 * -> nuevo: pedido
 * -> pagar: cobra un pedido
 * 
 */
define('ACCION', array('NUEVO', 'VER', 'PAGAR', 'CERRAR', 'PLATO'));
