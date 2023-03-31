<?php
    // Conectar a la base de datos
    require_once 'instancia.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los valores del formulario y el archivo de la imagen
    $nombre_producto = $_POST['nombre_producto'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_tipo = $_FILES['imagen']['type'];
    $imagen_tamano = $_FILES['imagen']['size'];
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    $creado = date('Y-m-d H:i:s');
    $categoria = $_POST['categoria'];

    // Validar que el archivo de la imagen se haya subido correctamente
    if ($imagen_tamano > 0) {
        // Mover el archivo de la imagen a la carpeta "img"
        $imagen_url = 'img/' . $imagen_nombre;
        move_uploaded_file($imagen_temporal, $imagen_url);
    } else {
        $imagen_url = '';
    }
    $sql = "INSERT INTO productos (nombre_producto, descripcion, precio, descuento, imagen, creado, categoria) VALUES ('$nombre_producto', '$descripcion', $precio, $descuento, '$imagen_url', '$creado', $categoria)";

    $db->query($sql);

    // Cerrar la conexión
    $db->close();
    header('Location: ../publico/carga_prod.php');
}
?>
