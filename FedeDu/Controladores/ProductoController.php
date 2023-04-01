<?php

require_once '../Modelos/ProductoModel.php';

class ProductoController {
    // Función pública que maneja la acción de agregar un nuevo producto
    public function agregar_producto() {
        // Verificar si se ha enviado el formulario de carga
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $nombre_producto = $_POST['nombre_producto'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $descuento = $_POST['descuento'];
            $imagen = '';
            $categoria = $_POST['categoria'];

            // Verifico si se ha enviado una imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {

                // Guardo el nombre del archivo y la extensión y el tamaño
                $imagen_nombre = $_FILES['imagen']['name'];
                $imagen_tipo = $_FILES['imagen']['type'];
                $imagen_tamano = $_FILES['imagen']['size'];

                // Guardo la imagen del formulario               
                $imagen_temporal = $_FILES['imagen']['tmp_name'];

                // Valido que el archivo de la imagen se haya subido correctamente
                if ($imagen_tamano > 0) {
                    // Mover el archivo de la imagen a la carpeta "Vistas/img"
                    $imagen_url = '../Vistas/img/' . $imagen_nombre;
                    move_uploaded_file($imagen_temporal, $imagen_url);
                } else {
                    //Si no se subió igual guardo el producto asi que pasamos la variable en blanco.
                    $imagen_url = '';
                }
            // Crear una instancia del modelo ProductoModel
            $producto_model = new ProductoModel();
            
            // Agregar el nuevo producto a la base de datos
            $producto_model->agregarProducto($nombre_producto, $descripcion, $precio, $descuento, $imagen_url, $categoria);
            
            // Redireccionar al formulario de carga nuevamente
            header('Location: ../Vistas/agregar_producto.php');
            exit();
            }
      
        } else {
            header('Location: ../Vistas/agregar_producto.php?carga=False');
        }

    }

    public function mostrar_producto($id_producto) {
        // Crear una instancia del modelo ProductoModel
        $producto_model = new ProductoModel();

        // Obtener el producto de la base de datos
        $producto = $producto_model->obtenerProducto($id_producto);

        // Mostrar el producto en una vista
        include 'views/mostrar_producto.php';
    }

    public function mostrar_productos() {
        // Crear una instancia del modelo ProductoModel
        $producto_model = new ProductoModel();

        // Obtener todos los productos de la base de datos
        $productos = $producto_model->obtenerProductos();

        // Mostrar los productos en una vista
        return $productos;
    }

    public function editar_producto(){

    }

    public function borrar_productos() {

    }

}

?>