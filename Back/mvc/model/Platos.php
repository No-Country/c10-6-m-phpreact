<?php
class Platos{
    private $con;

    public function __construct(){
        $this->con = new mysqli('localhost', 'root', '', 'resto_nocountry');
    }

    public function getProducto(){
        $query = mysqli_query($this->con,'SELECT * FROM productos');
        $retorno = [];
        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }

        return $retorno;
    }



}





// $con = new mysqli("localhost", "root", "", "resto_nocountry");
// $res=mysqli_query($con,"SELECT * FROM productos");
// $i=0;
// while ($sul= mysqli_fetch_array($res)){ 
//     $id_pt[$i]=$sul['id']; $np_pt[$i]=$sul['nombre_producto']; $pr_pt[$i]=$sul['precio'];
//     $i++;
// }
?>