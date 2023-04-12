<?php
require_once '../Controladores/PedidoController.php';
$control = new PedidoController;
$Pedido = $control->mostrar_Pedido($_GET['id']);
//$Pdetalle = json_decode($Pedido['detalle'], true);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Pedido</title>
</head>
<body>
    <h1>Editar Pedido</h1>
    <form method="post" action="../Controladores/PedidoController.php?accion=editar&id=<?php echo $Pedido['id'] ?>" enctype="multipart/form-data">

        <label for="mesa">mesa:</label>
        <input type="number" id="mesa" name="mesa" value="<?php echo $Pedido['mesa'] ?>"><br>

        <!-- <label for="detalle">detalle:</label>
        <button type="button" onclick="addFields()">+</button> <button type="button" onclick="removeFields()">-</button><br>
        <div id="wrapper">
        <?php //$i=0; 
        //foreach($Pdetalle as $cmp1 => $cmp2){ $i++;
            ?> 
            <input type="text" class="elemento" name="<?php //echo "CA".$i; ?>" value="<?php //echo $cmp1; ?>">
            <input type="text" class="elemento" name="<?php //echo "CB".$i; ?>" value="<?php //echo $cmp2; ?>"><br> 
            <?php
        //}
                
        ?>
        </div><br> -->

        <label for="producto">producto:</label>
        <input type="number" id="producto" name="producto" value="<?php echo $Pedido['producto'] ?>"><br>

        <label for="cantidad">cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="<?php echo $Pedido['cantidad'] ?>"><br>

        <label for="precio">precio:</label>
        <input type="number" id="precio" name="precio" value="<?php echo $Pedido['precio'] ?>"><br>

        <label for="descuento">descuento:</label>
        <input type="number" id="descuento" name="descuento" value="<?php echo $Pedido['descuento'] ?>"><br>

        <label for="estado">estado:</label>
        <input type="number" id="estado" name="estado" value="<?php echo $Pedido['estado'] ?>"><br>

        <div>
    </div>

        <input type="submit" value="Guardar Cambios"><br><br>
        <a href="mostrar_Pedidos.php">Volver</a>

    </form>
</body>
</html>

<!-- <script> 
    i="<?php //echo $i; ?>";
    function addFields() { i++;
        var dummy = '<input type="text" class="elemento" name="CA'+i+'"><input type="text" class="elemento" name="CB'+i+'"><br>';
        document.getElementById('wrapper').innerHTML += dummy;
    }
    function removeFields() { 
        if (i == 1) {}else{ i--;
            var elementos = document.querySelectorAll('.elemento');
            for (var e = elementos.length - 1; e >= elementos.length - 2; e--) {
                elementos[e].remove();
            }
        }
    }
</script> -->