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
            //$imagen = '';
            $categoria = $_POST['categoria'];

            // Verifico si se ha enviado una imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {

                // Guardo el nombre del archivo y la extensión y el tamaño
                $imagen_nombre = $_FILES['imagen']['name'];
                //$imagen_tipo = $_FILES['imagen']['type'];
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
            //si por alguna razón falla el envio del POST devolvemos a la vista de carga con un parametro false
            header('Location: ../Vistas/agregar_producto.php?carga=False');
        }

    }
    //Funcion para mostrar un producto individual
    public function mostrar_producto($id_producto) {
        // Crear una instancia del modelo ProductoModel
        $producto_model = new ProductoModel();

        // Traigo el producto de la base de datos con el id que recibo por parametro
        $producto = $producto_model->obtenerProducto($id_producto);

        // Devuelvo el producto en una variable
        return json_encode($producto);
    }

    public function mostrar_productos() {
        // Crear una instancia del modelo ProductoModel
        $producto_model = new ProductoModel();

        // Traigo todos los productos de la base de datos
        $productos = $producto_model->obtenerProductos();

        // Devuelvo los productos en una variable
        return $productos;
    }
    //Funcion para editar un producto
    public function editar_producto($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos del formulario
            $nombre_producto = $_POST['nombre_producto'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $descuento = $_POST['descuento'];
            $imagen_vieja = $_POST['imagen_vieja'];
            $categoria = $_POST['categoria'];

            // Verifico si se ha enviado una imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {

                // Guardo el nombre del archivo y la extensión y el tamaño
                $imagen_nombre = $_FILES['imagen']['name'];
                //$imagen_tipo = $_FILES['imagen']['type'];
                $imagen_tamano = $_FILES['imagen']['size'];

                // Guardo la imagen del formulario               
                $imagen_temporal = $_FILES['imagen']['tmp_name'];

                // Valido que el archivo de la imagen se haya subido correctamente
                if ($imagen_tamano > 0) {
                    // Mover el archivo de la imagen a la carpeta "Vistas/img"
                    $imagen_url = '../Vistas/img/' . $imagen_nombre;
                    move_uploaded_file($imagen_temporal, $imagen_url);
                    //Borro el archivo viejo de la carpeta
                    //Verifico que venga una dirección vieja para borrar
                    if (!$imagen_vieja=="") {
                        //Verifico que la imagen exista y si existe la borramos
                        if (file_exists($imagen_vieja)) {
                            unlink($imagen_vieja);
                        }
                    }
                } 
            } else {
                //Si no se subió una imagen nueva entonces guardamos en imagen_url la imagen original.
                $imagen_url = $imagen_vieja;
            }
            try {
                // Crear una instancia del modelo ProductoModel
                $producto_model = new ProductoModel();
                
                // Ejecutamos el metodo de edicion del modelos
                $producto_model->actualizarProducto($id, $nombre_producto, $descripcion, $precio, $descuento, $imagen_url, $categoria);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
            
            
            // Redireccionar a la vista de los productos
            header('Location: ../Vistas/mostrar_productos.php');
        }
    }

    public function borrar_producto($id) {
        //instancio el model
        $producto_model = new ProductoModel;
        //llamando a una funcion propia del controlador traigo el producto desde la base de datos
        $producto = self::mostrar_Producto($id);
        
        // Eliminar el producto de la base de datos
        if ($producto_model->borrarProducto($id)) {
            // Eliminar la imagen de la carpeta
            if (file_exists($producto['imagen'])) {
                unlink($producto['imagen']);
            }

            // Redireccionar a la lista de productos
            header('Location: ../Vistas/mostrar_productos.php');
        } else {
            header('Location: ../Vistas/mostrar_productos.php?borrado=false');
        }
    }

}

?>