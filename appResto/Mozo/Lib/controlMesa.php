<?php
require_once('mesaModel.php');
$mesas = new MesaModel;


if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'mostrar';
}

//con Switch buscamos el tipo de acción y ejecutamos la adecuada
switch ($accion) {
    case 'cerrar':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mesas->cambiarEstadoMesa($id, 20);
            header('Location: ../publico/servicio.php');
        } else {
            header('Location: ../publico/servicio.php');
        }
        break;
    case 'servido':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $mesas->cambiarEstadoMesa($id, 20);
            header('Location: ../publico/servicio.php');
        } else {
            header('Location: ../publico/servicio.php');
        }
        break;
    default://Establezco por defecto la verificación del estado de las mesas
        $mesas_disponibles = $mesas->obtenerMesas(); // función que retorna todas las mesas disponibles
        
        foreach ($mesas_disponibles as $mesa) {
            $mesa_id = $mesa['id'];
            $lista_estados_pedidos = [];
            $pedidos = $mesas->verifica_estado_pedidos_mesa($mesa_id);
            $estado_mesa = null;
            foreach ($pedidos as $pedido) {
                $estado_pedido = $pedido['estado'];
                array_push($lista_estados_pedidos, $estado_pedido);
            }

            if (in_array(1, $lista_estados_pedidos)) {
                $estado_mesa = 22;
                continue;
            } elseif (in_array(2, $lista_estados_pedidos) || in_array(3, $lista_estados_pedidos)) {
                $estado_mesa = 24;
                continue;
            } elseif ((in_array(4, $lista_estados_pedidos) || in_array(5, $lista_estados_pedidos)) && !in_array(6, $lista_estados_pedidos)) {
                $estado_mesa = 25;
                continue;
            }
            /*
            if ($estado_pedido == 1) {
                $estado_mesa = 22;
                break;
            }//Si hay al menos un pedido en estado 1 (Activo y sin entregar) salteamos el resto del codigo
        // Asignar estado 24 a la mesa si hay algún pedido en estado 2 o 3 y no hay en estado 1
            if (($estado_pedido == 2 || $estado_pedido == 3) && $estado_mesa != 22) {
                $estado_mesa = 24;
            }
            
            // Verificar si hay pedidos en estado 4 o 5 pero que no tenga pedidos en estado 6 y de ser así asignar estado 24 a la mesa
            if (($estado_pedido == 4 || $estado_pedido == 5) && $estado_pedido != 6 && $estado_mesa != 22 && $estado_mesa != 24) {
                $estado_mesa = 25;
            }
        //$mesas->cambiarEstadoMesa(3, 24);
        } */
            if (!is_null($estado_mesa)) {
                // Actualizar el estado de la mesa en la tabla 'mesa'
                $mesas->cambiarEstadoMesa($mesa_id, $estado_mesa);
            }
        }
        //verifica si hay pedidos en estado activo y luego actualiza el estado de las mesas segun esta respuesta
        $mozo = $mesas->obtenerMesas();
        break;
}

?>
