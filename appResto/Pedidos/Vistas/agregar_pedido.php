<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carga de Pedidos</title>
    <script> i=1;
        function addFields() { i++;
            var dummy = '<input type="text" name="CA'+i+'"><input type="text" name="CB'+i+'"><br>';
            document.getElementById('wrapper').innerHTML += dummy;
        }
        function removeFields() { 
            if (i == 1) {}else{
                i--;
                var wrapper = document.getElementById('wrapper');
                for (let a = 0; a < 3; a++) {
                    if (wrapper.lastChild) {
                        wrapper.removeChild(wrapper.lastChild);
                    }
                }
            }
        }
    </script>
</head>
<body>
    <h1>Carga de Pedidos</h1>
    <form action="../Controladores/PedidoController.php?accion=agregar" method="post" enctype="multipart/form-data">

        <label for="mesa">mesa:</label>
        <input type="number" id="mesa" name="mesa"><br>

        <label for="detalle">detalle:</label>
        <button type="button" onclick="addFields()">+</button> <button type="button" onclick="removeFields()">-</button>
        <div id="wrapper"></div>
            <input type="text" name="CA1"><input type="text" name="CB1"><br>
        </div>
        <br>
        
        <label for="importe_total">importe_total:</label>
        <input type="number" id="importe_total" name="importe_total"><br>

        <label for="descuento">descuento:</label>
        <input type="number" id="descuento" name="descuento"><br>

        <label for="estado">estado:</label>
        <input type="number" id="estado" name="estado"><br>

        <label for="cliente">cliente:</label>
        <input type="text" id="cliente" name="cliente"><br>


        <label for="cerrado">cerrado:</label>
        <input type="text" id="cerrado" name="cerrado"><br>

        <label for="observacion">observacion:</label>
        <input type="text" id="observacion" name="observacion"><br><br><br>

        <input type="submit" value="Cargar Pedido">
    </form>
    <br>
    <a href="mostrar_pedidos.php">volver</a> 



</body>
</html>

