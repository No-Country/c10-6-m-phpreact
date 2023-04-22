<?php

class PedidoModel {

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

    public function agregarPedido($id_mesa, $producto, $cantidad, $precio, $descuento, $estado) {

        $query = $this->db->prepare('INSERT INTO pedidos (id, mesa, producto, cantidad, precio, descuento, estado, creado, modificado) VALUES (DEFAULT, :mesa, :producto, :cantidad, :precio, :descuento, :estado, NOW(), NOW())');

        
        $query->bindParam(':mesa', $id_mesa);
        $query->bindParam(':producto', $producto);
        $query->bindParam(':cantidad', $cantidad);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':descuento', $descuento);
        $query->bindParam(':estado', $estado);

        return $query->execute();
    }

    public function obtenerPedidos() {

        $sql = "SELECT * FROM pedidos";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPedido($id_pedido) {

        $sql = "SELECT * FROM pedidos WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id_pedido);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarPedido($id_pedido, $id_mesa, $producto, $cantidad, $precio, $descuento, $estado) {
        try { //NOW()
            $sql = "UPDATE pedidos SET mesa = :mesa, producto = :producto, cantidad = :cantidad, precio = :precio, descuento = :descuento, estado = :estado, modificado = NOW() WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id_pedido);
            $query->bindParam(':mesa', $id_mesa);
            $query->bindParam(':producto', $producto);
            $query->bindParam(':cantidad', $cantidad);
            $query->bindParam(':precio', $precio);
            $query->bindParam(':descuento', $descuento);
            $query->bindParam(':estado', $estado);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function borrarPedido($id_pedido){

        // $sql = "DELETE FROM pedidos WHERE id = :idProducto";
        // $query = $this->db->prepare($sql);
        // $query->bindParam(':idProducto', $id_producto, PDO::PARAM_INT);

        // if ($query->execute()) {
        //     return true;
        // } else {
        //     return false;
        // }
    }
}