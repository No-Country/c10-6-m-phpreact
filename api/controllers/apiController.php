<?php
require_once('./models/mesaModel.php');
class ApiController
{
    public static $version;
    public static $controller;
    public static $model;
    public static $id;
    public static $route;

    public static function ruta($route)
    {
        foreach ($route as $clave => $valor) {

            self::${$clave} = $valor;
        }
        self::$route = $route;
    }

    public static function getVersion()
    {
        return self::$version;
    }
    public static function getModel($ruta)
    {
   //     debugE(json_decode($_POST['pedidos']));
//    debugE($_POST,__FILE__);
//    debugE($ruta);
//    debugE($ruta['model']);
        if ($ruta['model']) {
            $model = strtolower($ruta['model']);
            if (isset($_POST) && isset($_POST['pedidos']) && !empty($_POST['pedidos'])) {
                $pedidos = json_decode($_POST['pedidos']);
                $data = null;
                $mesa = null;
                switch ($model) {
                    case ('pedidos'):
                     
                       //self::respuesta($_POST['pedidos']);
                        foreach ($pedidos as $key => $pedido) {
                            if (isset($pedido->mesa)) {
                                $mesa = $pedido->mesa;
                            } else {
                                $data .= "($mesa , $pedido->id , $pedido->cantidad , $pedido->precio, $pedido->descuento,1 ,$pedido->obser ),";
                            }
                        }
                        $data = substr($data, 0, -1);
                        $consulta = $data;

                        break;
                    case ('anula'):
                           // actualiza un pedido a estado 5
                        $data .= '('; // parentesis para PDO
                        foreach ($pedidos as $key => $pedido) {
                            if (isset($pedido->mesa)) {
                                $mesa = $pedido->mesa;
                            } else {
                                foreach ($pedido as $pedido_id) {
                                    $data .= $pedido_id . ',';
                                }
                            }
                        }
                        $data = substr($data, 0, -1);
                        $data .= ')'; // cierro data para PDO
                        $consulta = array('mesa' => $mesa, 'data' => $data);
                        //echo $consulta;
                        break;
                    default:
                        break;
                }
            } else {
                $consulta = $ruta['id'];
            }
            // debugE($consulta,__FILE__.__LINE__) ;   
            // aca llamo modelo segun $model y $consulta
            $respuesta = MesaModel::$model($consulta);
            return $respuesta;
        } else {
            return 'error sin Modelo';
        }
    }
    public static function respuesta($consulta)
    {
        $consulta = json_encode($consulta);
        /* encabezadr CORS */
        header('Access-Control-Allow-Origin: *');
        /*  notifica encabezado json */
        header("Content-type: application/json; charset=utf-8");
        header('Content-Length: ' . strlen($consulta));
        header('Vary: Accept-Encoding');
        exit($consulta);
    }
}
