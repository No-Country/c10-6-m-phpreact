<?php 
require_once '../Controladores/ProductoController.php';
$bd = new ProductoController;
$productos = $bd->mostrar_productos();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mostrar productos</title>
</head>
<body>
	<h1>Lista de productos</h1>
	<table>
		<tr>
			<th>Nombre del producto</th>
			<th>Descripción</th>
			<th>Precio</th>
			<th>Descuento</th>
			<th>Categoría</th>
			<th>Imagen</th>
			<th>Acciones</th>
		</tr>
		<?php foreach ($productos as $producto): ?>
			<tr>
				<td><?php echo $producto['nombre_producto']; ?></td>
				<td><?php echo $producto['descripcion']; ?></td>
				<td><?php echo $producto['precio']; ?></td>
				<td><?php echo $producto['descuento']; ?></td>
				<td><?php echo $producto['categoria']; ?></td>
				<td><img src="<?php echo $producto['imagen']; ?>" alt="Imagen del producto" style="width: 100px;"></td>
				<td>
					<a href="<?php echo 'editar_producto.php?id=' . $producto['id']; ?>">Editar</a>
					<a href="<?php echo '../Controladores/selector.php?accion=borrar&id=' . $producto['id']; ?>">Borrar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<p><a href="agregar_producto.php">Agregar un nuevo producto</a></p>
</body>
</html>
