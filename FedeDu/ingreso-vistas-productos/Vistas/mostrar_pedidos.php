<?php 
require_once '../Controladores/PedidoController.php';
$bd = new PedidoController;
$pedidos = $bd->mostrar_pedidos();
?>
<title>Mostrar pedidos</title>
</head>
<body>
	<h1>Lista de pedidos</h1>
	<table>
		<tr>
			<th>Id de mesa</th>
			<th>Detalle</th>
			<th>Importe total</th>
			<th>Descuento</th>
			<th>Estado</th>
			<th>Nombre de cliente</th>
            <th>Fecha creacion</th>
            <th>Fecha cerrado</th>
			<th>Obsercacion</th>
		</tr>
		<?php foreach ($pedidos as $pedido): ?>
			<tr>
				<td><?php echo $pedido['mesa']; ?></td>
				<td><?php echo $pedido['detalle']; ?></td>
				<td><?php echo $pedido['importe_total']; ?></td>
				<td><?php echo $pedido['descuento']; ?></td>
				<td><?php echo $pedido['estado']; ?></td>				
				<td><?php echo $pedido['cliente']; ?></td>				
				<td><?php echo $pedido['creado']; ?></td>				
				<td><?php echo $pedido['cerrado']; ?></td>				
				<td><?php echo $pedido['observacion']; ?></td>				
				<td>
					<a href="<?php echo 'editar_pedido.php?id=' . $pedido['id']; ?>">Editar</a>
					<a href="<?php echo '../Controladores/selector.php?accion=borrar&id=' . $pedido['id']; ?>">Borrar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<p><a href="agregar_pedido.php">Agregar un nuevo pedido</a></p>
</body>
</html>
