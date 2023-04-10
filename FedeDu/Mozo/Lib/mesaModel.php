<?php
class MesaModel{
    private $pdo;
    public function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=resto_nocountry;charset=utf8', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function insertarMesa($estado_mesa, $qr){
        $stmt = $this->pdo->prepare('INSERT INTO mesas (estado_mesa, qr) VALUES (:estado_mesa, :qr)');
        $stmt->bindParam(':estado_mesa', $estado_mesa);
        $stmt->bindParam(':qr', $qr);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function actualizarMesa($id, $estado_mesa, $qr){
        $query = $this->pdo->prepare('UPDATE mesas SET estado_mesa=:estado_mesa, qr=:qr WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->bindParam(':estado_mesa', $estado_mesa);
        $query->bindParam(':qr', $qr);
        return $query->execute();
        $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerMesas() {
        $query = $this->pdo->prepare('SELECT * FROM mesas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function borrarMesa($id){
        $query = $this->pdo->prepare('DELETE FROM mesas WHERE id=:id');
        $query->bindParam(':id', $id);
        return $query->execute();
    }

    public function obtenerMesa($id){
        $query = $this->pdo->prepare('SELECT * FROM mesas WHERE id=:id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}


?>