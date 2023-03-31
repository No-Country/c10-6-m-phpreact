<?php
include '../Modelos/bd_conecta.php';
echo 'arranca';
//Recibimos la info por post.
if(isset($_POST["submit"])){
    $nombre_producto = $_POST["nombre_producto"];
    echo $nombre_producto;
    /* MANEJO DE IMAGENES CON BLOB
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($check !== false){
        $img = $_FILES['imagen']['tmp_name'];
    } else {
        echo "Error imagen";
    }*/
    $descripcion = $_POST["descripcion"];
    echo $descripcion;
    $imagen = $_POST["imagen"];//Adaptación al formato de la tabla
    echo $imagen;        
    //hacemos el insert
    $precio = $_POST["precio"];
    echo $precio;
    // verificamos la conección a la base
    if($bd->error){
        die("Conección Fallida: " . $bd->error);
    }

    /*
    $insert = $bd->enviarConsulta("INSERT INTO productos VALUES (DEFAULT, '$nombre_producto', '$descripcion','$precio', '1','$imagen', DEFAULT, '1');");
    //INSERT INTO `productos`(`id`, `nombre_producto`, `descripcion`, `precio`, `descuento`, `imagen`, `creado`, `categoria`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]')$sql = "INSERT INTO productos VALUES (DEFAULT,\'Prueba query\',\'prueba de funcionamiento query\',\'1050\',\'1\',\'prueba/imagen.jpg\',DEFAULT,\'3\');";
    if($insert){
        header('../Vista/carga_platos.php');*/
    }else{
        echo "no funcionó el insert";
    } 


?>