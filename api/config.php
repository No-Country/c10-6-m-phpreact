<?php
define('ENTORNO_LOCAL',false);
if (ENTORNO_LOCAL) {
    if (!defined('DEV')) {
        define('DEV', true);
        define('SERVER', 'localhost:3308');
        define('USER', 'root');
        define('PASS', '');
        define('DB', 'resto_nocountry');
        define('ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/api/');
        define('OPTIONS', ' array("PDO::ATTR_ERRMODE" => "PDO::ERRMODE_EXCEPTION",
            "PDO::ATTR_DEFAULT_FETCH_MODE" => "PDO::FETCH_ASSOC")');
        session_start();
    }
} else {
    if (!defined('DEV')) {
        define('DEV', true);
        define('SERVER', 'localhost');
        define('USER', '');
        define('PASS', '');
        define('DB', '');
        ini_set('display_errors', 1);
        define('ROOT', '/api/');
        session_start();
    }
}
if (DEV) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
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

function debugE($debug,$data=' n/d')
{
    if (DEV) {
        echo '<pre>';
        //print_r($debug);
         var_dump($debug);
        echo '</pre>';
        echo PHP_EOL;
        echo ' Time: '.time() .PHP_EOL.'Data : '. $data;
        exit();
    }
}
/* VERIFICADO mesas PERMITIDAS */
define('MESAS', array(1, 2, 3, 4, 5, 6, 7, 8, 9));
define('VERSION', array('V1'));
define('CONTROLLER', array('MESA', 'PRODUCTO', 'PRODUCTOS', 'PEDIDO','TOKEN'));
define('MODEL', array('LOGIN', 'PRODUCTOS', 'PEDIDO', 'PEDIDOS', 'MESA', 'MOZO', 'PEDIDOSVER', 'ANULA','TOKEN'));


if (DEV) {
    // $p1 = array("id" => 1, "cantidad" => 1, "precio" => 1050, "descuento" => 0.3, "obser" => "'grande'");
    // $p2 = array("id" => 2, "cantidad" => 2, "precio" => 150, "descuento" => 0.9, "obser" => "'fria'");
    // $p3 = array("id" => 3, "cantidad" => 2, "precio" => 5000, "descuento" => 0, "obser" => "''");
    // $pedido = array("mesa" => rand(1, 9));
    // $pedidos = array($pedido, $p1, $p2, $p3);
    // $_POST['pedidos'] = json_encode($pedidos);
    // echo $_POST['pedidos'];
}

if (DEV) {
    $p1 = array(600, 601, 602, 624, 627);
    $pedido = array("mesa" => 3);
    // $pedido = array("mesa" => rand(1, 9));
    $pedidos = array($pedido, $p1);
    //    $_POST['pedidos'] = json_encode($pedidos);
}
