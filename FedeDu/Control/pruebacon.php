<?php
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('CLAVE', '');
define('BASE','resto_nocountry');

$bd = new mysqli(SERVIDOR, USUARIO, CLAVE, BASE);
$query = "INSERT INTO productos VALUES (DEFAULT,'nombre_producto','imagen','descripcion',200, 0, DEFAULT, 1)";

echo $bd->select_db(BASE) or die( "Unable to select database");

$resultado = $bd->query($query);
				if(!$resultado) {
					$error = $bd->error;
					return $error;
				} else {
					return $bd->insert_id;
				}
?>