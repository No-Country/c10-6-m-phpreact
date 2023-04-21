<?php
require_once('./config.php');
require_once('./controllers/apiController.php');
require_once('./controllers/routeController.php');
require_once('./controllers/dbController.php');
ApiController::ruta(RouteController::route());
$ruta = ApiController::$route;
/// debug///
$data='';
$data .= json_encode($_SERVER['REMOTE_ADDR']);
$data .=(json_encode($_SERVER['REQUEST_URI']));
if(isset($_POST['pedidos'])){
//debugE($_POST);
$data .=json_encode($_POST['pedidos']);
//  $data .= json_encode(file_get_contents('php://input'));
}
//$data .=json_encode($ruta);
grabaLog2($data);
//// fin debug ///
$consulta='';
switch ($ruta['controller']) {
    case ('MESA'):
        $consulta = ApiController::getModel($ruta); // segun modelo traera datos
        break;
    case ('TOKEN'):
        $consulta=array('TOKEN'=>time());
        break;
    default:
        $consulta= 'error';    
        break;
}
echo ApiController::respuesta($consulta);
function grabaLog2($data){
    $conexion = mysqli_connect('localhost', USER, PASS, DB);
    $query = "INSERT INTO `log` (`log`) VALUES ('".$data."');";
    mysqli_query($conexion, $query);
    mysqli_close($conexion);
}