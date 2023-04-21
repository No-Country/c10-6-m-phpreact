<?php 
require_once '../lib/conection.php';
$bd = new conection;
$productos = $bd->mostrar_productos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carta BOCATTO</title>
	<link rel="stylesheet" href="css/estilosCliente.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
	<div class="container">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
            <h1>BOCATTO Restó</h1>
		</div>
	</nav>
		<div>
		<div class="card-deck">
		<form action="../lib/clienteController.php?accion=agregar" method="POST">
        <label for="id_mesa">Ingrese su número de mesa</label>
        <input type="number" name="id_mesa" id="id_mesa" required>

    <?php foreach ($productos as $producto): ?>
        <form action="../lib/clienteController.php?accion=agregar" method="POST">
        <div class="card">
            <!-- Campo para el checkbox -->
            <input type="hidden" name="producto_id" value="<?php echo $producto["id"]; ?>" class="m-1">
            <!-- Imagen y detalles del producto -->
            <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="Imagen del producto">
            <div class="card-body">
                <h5 class="card-title"><?php echo $producto['nombre_producto']; ?></h5>
                <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                <p class="card-text">$<?php echo $producto['precio']; ?></p>
                <!-- Campo para las observaciones -->
                <div class="form-group m-2">
                    <label for="input-number">Cantidad:</label>
                    <input type="number" name="cantidad" class="form-control" id="input-number" min="1" max="10" step="1" value="1">
                </div>
                <div class="m-2">
                <input type="text" name="observaciones" class="form-control" placeholder="Observaciones">
				<input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>" class="m-2">
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Campo para el ID del cliente -->
	
    <!-- Botón de enviar -->
    
</form>
</div>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>
</html>
