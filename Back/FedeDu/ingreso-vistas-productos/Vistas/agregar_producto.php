<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carga de Productos</title>
</head>
<body>
    <h1>Carga de Productos</h1>
    <form action="../Controladores/ProductoController.php?accion=agregar" method="post" enctype="multipart/form-data">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" name="nombre_producto" id="nombre_producto" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="5" cols="40" required></textarea><br><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step=".01" min="0" required><br><br>

        <label for="descuento">Descuento (%):</label>
        <input type="number" name="descuento" id="descuento" min="0" max="100" required><br><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" required><br><br>

        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria" required>
            <option value="">Seleccione una categoría</option>
            <option value="1">Categoría 1</option>
            <option value="2">Categoría 2</option>
            <option value="3">Categoría 3</option>
        </select><br><br>

        <input type="submit" value="Cargar Producto">
    </form>
    <br>
    <a href="mostrar_productos.php">volver</a> 
</body>
</html>