<?php
include("basededatos.php");

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('CLAVE', '');
define('BASE','resto_nocountry');


$bd = new Basededatos(SERVIDOR, USUARIO, CLAVE, BASE);
?>