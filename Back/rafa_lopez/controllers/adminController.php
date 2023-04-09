<?php
class AdminController extends AppController
{

    public function __construct()
    {
    }
    public function listar($conn)
    {
        $stmt = $conn->prepare("SELECT * FROM `productos` WHERE `estado` = 0 ");
        //$stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->desconectarDB();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
