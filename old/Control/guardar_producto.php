<?php
// Conectar a la base de datos
$servername = "nombre_del_servidor";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_la_base_de_datos";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Obtener los valores del formulario
$nombre_producto = $_POST['nombre_producto'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$categoria = $_POST['categoria'];

// Procesar la imagen (si se ha cargado una)
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");

    // Verificar que la extensión sea válida
    if(in_array($imageFileType,$extensions_arr) ){
        // Mover la imagen al directorio de uploads
        move_uploaded_file($_FILES['imagen']['tmp_name'],$target_dir.$_FILES['imagen']['name']);

        // Guardar el nombre de la imagen en la base de datos
        $imagen = $_FILES['imagen']['name'];
    }
} else {
    $imagen = '';
}

// Crear la consulta SQL para insertar el producto en la base de datos
$sql = "INSERT INTO productos (nombre_producto, descripcion, precio, descuento, imagen, categoria) VALUES ('$nombre_producto', '$descripcion', '$



