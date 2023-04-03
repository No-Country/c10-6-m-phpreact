<?php
require_once('config.php');
require_once('clases/app.php');
require_once('clases/productos.php');
require_once('clases/mesa.php');
// inicializa app
$app = new App();
// inicializa ruta, hace todas las verificaciones correspondientes
$app->setRuta();
// verifica si existe la mesa

if ($app->rutas['mesa']) :
  // crea mesa y asigan el id a rutas
  $mesa = new Mesa($app->rutas['mesa']);
  // controlado con mesa asignada
  require_once('controladores/codigo_con_mesa_asignada.php');
else :
  // aca va codigo si no existe mesa, por ejemplo url manipulada o url vacia
  echo "<script>window.alert('No pude identificar la mesa en la que te encuentras')</script>";
  //controaldo sin mesa asignada
  require_once('controladores/codigo_sin_mesa_asignada.php');
endif;
exit();
