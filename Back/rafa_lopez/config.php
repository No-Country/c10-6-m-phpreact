<?php
define('DEV', true);
define('TOKEN', 'nocountry');
if (!defined('ENTORNO')) {
    define('ENTORNO', 'dev');
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
define('MESAS', array(1, 2, 3, 4, 5, 6, 7, 8, 9));
