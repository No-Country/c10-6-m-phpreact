<?php
class Platos{
    private $con;

    public function __construct(){
        $this->con = new PDO("mysql:host=localhost;dbname=resto_nocountry", "root", "");
    }

    public function getProducto(){
        $sql = "SELECT * FROM productos";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();

        $retorno = [];
        $i = 0;
        while($fila = $stmt->fetch()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }

    public function inProducto(){



    }


}


?>