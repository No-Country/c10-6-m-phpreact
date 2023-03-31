<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cargador de platos</title>
</head>
<body>
    <form action="../Control/Control_plato.php" method="post" enctype="multipart/form-data">
        <div>
        <input type="text" name="nombre_producto" placeholder="nombre producto">
        </div>
        <div>
        <textarea name="descripcion" cols="30" rows="10" placeholder="Descripción del producto"></textarea>
        </div>
        <div>
        <input step="0.01" type="number" name="precio">
        </div>
        <div>
        <input type="text" name="imagen" placeholder="url imagen"><!-- input de prueba de carga -->
        </div>
        <div>
        <input type="submit" value="Cargar Plato">
        </div>
    </form>
</body>
</html>