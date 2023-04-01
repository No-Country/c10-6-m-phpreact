<?php

class ProductoModel {

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

    public function agregarProducto($nombre_producto, $descripcion, $precio, $descuento, $imagen, $categoria) {


        $query = $this->db->prepare('INSERT INTO productos (id, nombre_producto, descripcion, precio, descuento, imagen, creado, categoria) VALUES (DEFAULT, :nombre, :descripcion, :precio, :descuento, :imagen, NOW(), :categoria)');

        // Ejecutar la consulta SQL
        //$sql->execute([$nombre_producto, $descripcion, $precio, $descuento, $imagen, $categoria]);
        //Implemento el método binParam porque ofrece mayor seguridad a la hora de cargar un dato a la base de datos.
        
        $query->bindParam(':nombre', $nombre_producto);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':descuento', $descuento);
        $query->bindParam(':imagen', $imagen);
        $query->bindParam(':categoria', $categoria);

        return $query->execute();
    }

    public function obtenerProductos() {

        $sql = "SELECT * FROM productos";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProducto($id) {

        $sql = "SELECT * FROM productos WHERE id_producto = :id";
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

}

/*
class ProductoModel {
    
    private $conexion;

    public function __construct() {
        // Establecer la conexión con la base de datos
        $this->conexion = new PDO('mysql:host=localhost;dbname=resto_nocountry;charset=utf8', 'usuario', 'contraseña');
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function agregarProducto($nombre_producto, $descripcion, $precio, $descuento, $imagen, $categoria) {
        // Preparar la consulta SQL
        $stmt = $this->conexion->prepare('INSERT INTO productos (nombre_producto, descripcion, precio, descuento, imagen, creado, categoria) VALUES (DEFAULT, ?, ?, ?, ?, ?, NOW(), ?)');

        // Ejecutar la consulta SQL
        $stmt->execute([$nombre_producto, $descripcion, $precio, $descuento, $imagen, $categoria]);
    }
    
    public function obtenerProductos() {
        // Preparar la consulta SQL
        $stmt = $this->conexion->prepare('SELECT * FROM productos');

        // Ejecutar la consulta SQL
        $stmt->execute();

        // Obtener los resultados de la consulta SQL
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados
        return $resultados;
    }

    public function obtenerProducto($id_producto) {
        // Preparar la consulta SQL
        $query = $this->conexion->prepare('SELECT * FROM productos WHERE id_producto = $id_producto');

        // Ejecutar la consulta SQL
        $query->execute();

        // Obtener los resultados de la consulta SQL
        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados
        return $resultados;
    }
}*/

?>
