<?php
class MesaModel
{
    public static $msg;
    public static function productos($id)
    {
        try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            if (!$id) {
                //   $sql = "SELECT  `id`,`nombre_producto`,`descripcion`,`precio`,`imagen` FROM `productos` WHERE `estado`=1; ";
                $sql = "SELECT `productos`.`id`, `nombre_producto`, `descripcion`, `precio`, `imagen`, `categorias`.`categoria` 
             FROM `productos` 
             JOIN `categorias` ON `productos`.`categoria` = `categorias`.`id` 
             WHERE `productos`.`estado` = 1;";
                $query = $conn->prepare($sql);
            } else {
                //                $sql = "SELECT `id`,`nombre_producto`,`descripcion`,`precio`,`imagen` FROM `productos` WHERE `estado`=1 AND `id`= :id; ";
                $sql = "SELECT `productos`.`id`, `nombre_producto`, `descripcion`, `precio`, `imagen`, `categorias`.`categoria` FROM `productos` JOIN `categorias` ON `productos`.`categoria` = `categorias`.`id` WHERE `productos`.`estado` = 1 AND `productos`.`id`= :id;";
                $query = $conn->prepare($sql);
                $query->bindParam(':id', $id);
            }
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $result;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
            return  false;
        }
    }
    public static function login($id)
    {
        try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            $sql = "UPDATE `mesas` SET `estado_mesa` = 21 WHERE `id` = ? AND `estado_mesa`= 20;";
            $query = $conn->prepare($sql);
            $query->execute([$id]);
            $query->closeCursor();
            $header = ROOT . ApiController::$route['version'] . '/PRODUCTOS/';
            header("Location: $header");
            return true;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function pedidos($id)

    {
       try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            $sql = "INSERT INTO `pedidos` (`mesa`, `producto`, `cantidad`, `precio`, `descuento`,`estado`,`observaciones`) VALUES " . $id . ";";
            $query = $conn->prepare($sql);
            $result = $query->execute();
            $query->closeCursor();
            $header = ROOT . ApiController::$route['version'] . '/PRODUCTOS/';
            //            header("Location: $header");
            //self::obtenerProducts(1); // no vale la pena
            return $result;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
            echo self::$msg;
            return false;
        }
    }
    public static function pedidosver($id)
    {
        try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            $sql = "SELECT `id`,`mesa`,`producto`,`cantidad`,`precio`,`descuento`,`estado` FROM `pedidos` WHERE `mesa`= ?  AND `estado` IN(1,2,3,4,5);";
            $query = $conn->prepare($sql);
            $query->execute([$id]);
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $result;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
            return  false;
        }
    }

    public static function anula($id)
    {
        $msg = null;
        try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            $sql = " UPDATE `pedidos` SET `estado` = '5' WHERE `pedidos`.`mesa`= :mesa AND `pedidos`.`id`  IN " . $id['data'] . ";";

            $query = $conn->prepare($sql);
            $query->bindParam(':mesa', $id['mesa']);
            $result = $query->execute();
            $query->closeCursor();
          //  debugE($result,__FILE__.__LINE__) ;
//            $header = ROOT . ApiController::$route['version'] . '/PRODUCTOS/';
  //          header("Location: $header");
            return $result;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
            echo self::$msg;
            return false;
        }
    }
     public static function mozo($id)
    {
        $msg = null;
        try {
            $conexion = DbController::getInstance();
            $conn = $conexion->getConnection();
            $sql = " UPDATE `mesas` SET `estado_mesa` = '23' WHERE `mesas`.`id` = :mesa ;";
            $query = $conn->prepare($sql);
            $query->bindParam(':mesa', $id);
            $result = $query->execute();
            $query->closeCursor();
           // debugE($result, __FILE__ . __LINE__);
            //    $header = ROOT . ApiController::$route['version'] . '/PRODUCTOS/';
            //     //          header("Location: $header");
            return $result;
        } catch (PDOException $e) {
            self::$msg = "Error: " . $e->getMessage();
           //echo self::$msg;
            return false;
        }
    }
}
