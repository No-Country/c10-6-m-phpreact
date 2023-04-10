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

    public function agregarPedido($id_mesa, $detalle, $importe_total, $descuento, $estado, $cliente, $cerrado, $observacion) {

        $query = $this->db->prepare('INSERT INTO pedidos (id, mesa, detalle, importe_total, descuento, estado, cliente, creado, cerrado ,observacion) VALUES (DEFAULT, :mesa, :detalle, :importe_total, :descuento, :estado, :cliente, NOW(), :cerrado, :observacion)');

        
        $query->bindParam(':mesa', $id_mesa);
        $query->bindParam(':detalle', $detalle);
        $query->bindParam(':importe_total', $importe_total);
        $query->bindParam(':descuento', $descuento);
        $query->bindParam(':estado', $estado);
        $query->bindParam(':cliente', $cliente);
        $query->bindParam(':cerrado', $cerrado);
        $query->bindParam(':observacion', $observacion);

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

    public function actualizarPedido($id_pedido, $id_mesa, $detalle, $importe_total, $descuento, $estado, $cliente
    , $cerrado, $observacion) {
        try {
            $sql = "UPDATE pedidos SET mesa = :mesa, detalle = :detalle, importe_total = :importe_total, descuento = :descuento, estado = :estado, cliente = :cliente, cerrado = :cerrado, observacion = :observacion WHERE id = :id";
            $query = $this->db->prepare($sql);
            $query->bindParam(':id', $id_pedido);
            $query->bindParam(':mesa', $id_mesa);
            $query->bindParam(':detalle', $detalle);
            $query->bindParam(':importe_total', $importe_total);
            $query->bindParam(':descuento', $descuento);
            $query->bindParam(':estado', $estado);
            $query->bindParam(':cliente', $cliente);
            $query->bindParam(':cerrado', $cerrado);
            $query->bindParam(':observacion', $observacion);
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