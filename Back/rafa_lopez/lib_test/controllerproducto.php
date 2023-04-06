<?php
//require_once('./controller/controllerapp.php');
class ControllerProducto extends ControllerApp
{
    protected $id;
    protected $nombre_producto;
    protected $descripcion;
    protected $precio;
    protected $descuento;
    protected $imagen;
    protected $categoria;
    protected $estado;


    public function __construct()
    {
    }
    public function   getProducto($conn)
    {
        $sql = "SELECT * FROM productos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
