<?php
require_once('../Lib/controlMesa.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Mesas</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
$chunked_mesas = array_chunk($mozo, 2); // dividir las mesas en grupos de 3
foreach ($chunked_mesas as $grupo_mesas) { // recorrer cada grupo de mesas
?>
<div>
  <?php 
  foreach ($grupo_mesas as $mesa) { // recorrer cada mesa dentro del grupo
  ?>
  <div class="mesa" style="border:1px solid;"  id="<?php echo $mesa['id'];?>" >
    <div class="card">
      <div class="card-title"><?php echo $mesa['id'];?></div>
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
                                      <a href="#" class="btn btn-light bg-gradient h-100 w-100 mesa" id="<?php echo $mesa['id']; ?>">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Mesa Libre</p> <?php
                                } elseif ($mesa['estado_mesa']==21) {
                                    ?>  
                                      <a href="#" class="btn btn-warning bg-gradient h-100 w-100 mesa" onclick="mostrarElemento(<?php echo $mesa['id']; ?>)">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Mesa Ocupada</p> <?php
                                } elseif ($mesa['estado_mesa']==22){
                                    ?>  
                                      <a href="#" class="btn btn-danger bg-gradient h-100 w-100 mesa" onclick="mostrarElemento(<?php echo $mesa['id']; ?>)">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Pedido Realizado</p> <?php
                                } elseif ($mesa['estado_mesa']==24){
                                  ?>  
                                      <a href="#" class="btn btn-secondary bg-gradient h-100 w-100 mesa" onclick="mostrarElemento(<?php echo $mesa['id']; ?>)">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Sin Pedidos Pendientes</p> <?php
                                } elseif ($mesa['estado_mesa']==25){
                                      ?>  
                                      <a href="../lib/controlMesa.php?accion=cerrar&id=<?php echo $mesa['id'];?>" class="btn btn-success bg-gradient h-100 w-100 mesa" onclick="confirm('Está seguro de cerrar la mesa')" id="cerrar">
                                      <h5 class="card-title border border-1 bg-danger-subtle bg-gradient blanco"><?php echo $mesa['id']; ?></h5>
                                      <p class="card-text ">Cobrada <?php echo $mesa['estado_mesa'];?></p>
                                      <p class="card-text ">Tocar para Cerrar</p> <?php
                                      
                                  }?>
                                  <?php 
            
          } // fin del foreach para cada mesa\n            ?>
      <div class="card-text">Estado actual: <span class="estado"></span></div>
      <div class="card-text ocultas" id="mesa-1">Contenido de la mesa 1</div>
    </div>
  </div>
  <?php 
        } // fin del foreach para cada grupo de mesas
        ?>
</div>
  <a href="#" class="mesa">Ver Mesa 1</a>
  <a href="#" class="mesa">Ver Mesa 2</a>
  <a href="#">Enlace normal</a>

  <script>
    $(document).ready(function() {

      setInterval(function() {
        $('.mesa').each(function() {
          var url = '../lib/controlMesa.php?accion=mesa&id=' + $(this).find('.card-title').id();
          $.get(url, function(data) {
            $(this).find('.estado').html(data);
          }.bind(this));
        });
      }, 5000);
    
      // Actualizar estado de la mesa cuando cambia
      $('.mesa').click(function() {
        var url = '../lib/controlMesa.php?accion=mesa&id=' + $(this).find('.mesa').id();
        $.get(url, function(data) {
          $(this).find('.estado').html(data);
        }.bind(this));
        return false;
      });
    
      // Mostrar tabla correspondiente al hacer clic en una etiqueta a
      $('a').click(function() {
        var id = $(this).text().replace('Ver Mesa ', '');
        if ($(this).hasClass('mesa')) {
          $('.ocultas').hide();
          $('#mesa-' + id).show();
        }
      });
    
    });
  </scrip>
</body>
</html>
