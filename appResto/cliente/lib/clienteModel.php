<?php

class ClienteModel {

    private $db;

    public function __construct() {
        $this->db = $this->conectarBD();
    }

    private function conectarBD() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=resto_nocountry', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET CHARACTER SET utf8");
            return $db;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }

    
    public function obtenerProductos() {

        $sql = "SELECT * FROM productos";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProducto($id) {

        $sql = "SELECT * FROM productos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function agrega_pedidos_mesa($producto_id, $mesa, $precio, $observacion) {
        $sql = "INSERT INTO pedidos (mesa, precio, observacion) VALUES (:producto, :mesa, :precio, :observacion)SELECT * FROM productos WHERE id = :producto_id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':producto', $producto_id, PDO::PARAM_INT);
        $query->bindParam(':mesa', $mesa, PDO::PARAM_INT);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':observacion', $observacion);
        
        return $query->execute();
    }

    
}