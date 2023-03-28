<?php
include("basededatos.php");

define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('CLAVE', '');
define('BASE','perros');


$bdconx = new Basededatos(SERVIDOR, USUARIO, CLAVE, BASE);
?>