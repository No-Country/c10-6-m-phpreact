<?php
require_once '../Controladores/ProductoController.php';
$control = new ProductoController;
$producto = $control->mostrar_producto($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="post" action="../Controladores/ProductoController.php?accion=editar&id=<?php echo $producto['id'] ?>" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre_producto" value="<?php echo $producto['nombre_producto'] ?>"><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $producto['descripcion'] ?></textarea><br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" value="<?php echo $producto['precio'] ?>"><br>

        <label for="descuento">Descuento:</label>
        <input type="number" id="descuento" name="descuento" value="<?php echo $producto['descuento'] ?>"><br>

        <label for="categoria">Categoría:</label>

        <select name="categoria" id="categoria" required>
            <option value="" <?php echo $producto['categoria'] == "" ? 'selected' : '' ?>>Seleccione una categoría</option>
            <option value="1" <?php echo $producto['categoria'] == 1 ? 'selected' : '' ?>>Categoría 1</option>
            <option value="2" <?php echo $producto['categoria'] == 2 ? 'selected' : '' ?>>Categoría 2</option>
            <option value="3" <?php echo $producto['categoria'] == 3 ? 'selected' : '' ?>>Categoría 3</option>
        </select><br><br>

        <div>
        <label for="imagen">Imagen:</label>
        <input type="hidden" name="imagen_vieja" value="<?php echo $producto['imagen']; ?>">
        <?php if ($producto['imagen']): ?>
            <img src="<?php echo $producto['imagen'] ?>" alt="Imagen original del producto"><br>
        <?php else: ?>
            <p>No se ha cargado ninguna imagen</p><br>
        <?php endif; ?>
        <input type="file" name="imagen" id="imagen"><br>
    </div>

        <input type="submit" value="Guardar Cambios"><br><br>
        <a href="mostrar_productos.php">Volver</a>

    </form>
</body>
</html>
