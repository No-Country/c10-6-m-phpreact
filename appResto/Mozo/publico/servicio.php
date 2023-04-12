<?php
require_once('../Lib/controlMesa.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicio <?php echo "NOMBRE MOZO" ?></title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body data-bs-theme="dark">

    <div class="container">

        <h1 class="text-center bg-danger border border-danger border-1 rounded-5 rounded-top-0 mt-1 align-midle p-2 blanco">Mesas</h1>

        <?php
        $chunked_mesas = array_chunk($mozo, 2); // dividir las mesas en grupos de 3
        foreach ($chunked_mesas as $grupo_mesas) { // recorrer cada grupo de mesas
        ?>

        <div class="row row-cols-2 g-6 mb-1">

            <?php 
            foreach ($grupo_mesas as $mesa) { // recorrer cada mesa dentro del grupo
            ?>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                                <?php
                                //establecemos los posibles estados de las mesas y segun el estado lo que debe mostrar
                                if ($mesa['estado_mesa']==23) { ?>  
                                    <a href="../lib/controlMesa.php?accion=servido&id=<?php echo $mesa['id'];?>" class="btn btn-info bg-gradient h-100 w-100 mesa" onclick="confirm('¿Se atendió al cliente?')">
                                    <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco" ><?php echo $mesa['id']; ?></h5>
                                    <p class="card-text ">Requiere Servicio</p> 
                                    <p class="card-text ">Tocar para asentar servicio</p>
                                    <?php
                                } elseif ($mesa['estado_mesa']==20) {
                                    ?>  
                                      <a href="#" class="btn btn-light bg-gradient h-100 w-100 mesa">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Mesa Libre</p> <?php
                                } elseif ($mesa['estado_mesa']==21) {
                                    ?>  
                                      <a href="#" class="btn btn-warning bg-gradient h-100 w-100 mesa">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Mesa Ocupada</p> <?php
                                } elseif ($mesa['estado_mesa']==22){
                                    ?>  
                                      <a href="#" class="btn btn-danger bg-gradient h-100 w-100 mesa">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Pedido Realizado</p> <?php
                                } elseif ($mesa['estado_mesa']==24){
                                  ?>  
                                      <a href="#" class="btn btn-secondary bg-gradient h-100 w-100 mesa">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Sin Pedidos Pendientes</p> <?php
                                } elseif ($mesa['estado_mesa']==25){
                                      ?>  
                                      <a href="../lib/controlMesa.php?accion=cerrar&id=<?php echo $mesa['id'];?>" class="btn btn-success bg-gradient h-100 w-100 mesa" onclick="confirm('Está seguro de cerrar la mesa')" id="cerrar">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Cobrada <?php echo $mesa['estado_mesa'];?></p>
                                      <p class="card-text ">Tocar para Cerrar</p> <?php
                                      
                                  }?>
                        </a>
                    </div>
                </div>
            </div>

            <?php 
            
            } // fin del foreach para cada mesa\n            ?>

        </div>

        <?php 
        } // fin del foreach para cada grupo de mesas
        ?>

    </div>



    <script>
      setInterval(function(){
        location.reload();
      }, 10000); // 5000 milisegundos = 5 segundos
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>