<!DOCTYPE html>
<html>
<head>
	<title>Formulario de productos</title>
</head>
<body>
	<h1>Formulario de productos</h1>
	<form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
		<label for="nombre_producto">Nombre del producto:</label>
		<input type="text" name="nombre_producto" id="nombre_producto" required>
		<br>
		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion" id="descripcion" required></textarea>
		<br>
		<label for="precio">Precio:</label>
		<input type="number" name="precio" id="precio" step="0.01" required>
		<br>
		<label for="descuento">Descuento:</label>
		<input type="number" name="descuento" id="descuento" min="0" max="100" required>
		<br>
		<label for="imagen">Imagen:</label>
		<input type="file" name="imagen" id="imagen" accept="image/*" required>
		<br>
		<label for="categoria">Categoría:</label>
		<select name="categoria" id="categoria" required>
			<option value="1">Categoría 1</option>
			<option value="2">Categoría 2</option>
			<option value="3">Categoría 3</option>
		</select>
		<br>
		<input type="submit" value="Guardar">
	</form>
</body>
</html>