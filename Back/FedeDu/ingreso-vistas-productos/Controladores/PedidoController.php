<?php

require_once '../Modelos/PedidoModel.php';

class PedidoController {
    public function agregar_pedido() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_mesa = $_POST['mesa'];

            //$detalle = $_POST['detalle']; //resivir y convertir a json
            $i=0;
            while (true) { $i++;
                if (isset($_POST["CA".$i])) {
                    if (isset($_POST["CB".$i])) {
                        $detalle[$_POST["CA".$i]] = $_POST["CB".$i];
                    }
                }else{
                    break;
                }
            }
            $detalle = json_encode($detalle);

            $importe_total = $_POST['importe_total'];
            $descuento = $_POST['descuento'];
            $estado = $_POST['estado'];
            $cliente = $_POST['cliente'];
            $cerrado = $_POST['cerrado'];
            $observacion = $_POST['observacion'];

            $pedido_model = new PedidoModel();
            
            $pedido_model->agregarPedido($id_mesa, $detalle, $importe_total, $descuento, $estado, $cliente
            , $cerrado, $observacion);
            
            header('Location: ../Vistas/agregar_pedido.php');
            exit();
      
        } else {
            header('Location: ../Vistas/agregar_pedido.php?carga=False');
        }

    }
    public function mostrar_pedido($id_pedido) {
        $pedido_model = new PedidoModel();

        $pedido = $pedido_model->obtenerPedido($id_pedido);

        return $pedido;
    }

    public function mostrar_pedidos() {
        $pedido_model = new PedidoModel();

        $pedidos = $pedido_model->obtenerPedidos();

        return $pedidos;
    }
    public function editar_pedido($id_pedido){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_mesa = $_POST['mesa'];

            //$detalle = $_POST['detalle'];//resivir y convertir a json

            $i=0;
            while (true) { $i++;
                if (isset($_POST["CA".$i])) {
                    if (isset($_POST["CB".$i])) {
                        $detalle[$_POST["CA".$i]] = $_POST["CB".$i];
                    }
                }else{
                    break;
                }
            }
            $detalle = json_encode($detalle);

            $importe_total = $_POST['importe_total'];
            $descuento = $_POST['descuento'];
            $estado = $_POST['estado'];
            $cliente = $_POST['cliente'];
            $cerrado = $_POST['cerrado'];
            $observacion = $_POST['observacion'];


            try {
                $pedido_model = new PedidoModel();
                
                $pedido_model->actualizarPedido($id_pedido, $id_mesa, $detalle, $importe_total, $descuento, $estado, $cliente, $cerrado, $observacion);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
            
            
            header('Location: ../Vistas/mostrar_pedidos.php');
        }
    }

    public function borrar_pedido($id_pedido) {
        $pedido_model = new PedidoModel;
        $pedido = self::mostrar_Pedido($id_pedido);
        
        if ($pedido_model->borrarPedido($id_pedido)) {

            header('Location: ../Vistas/mostrar_pedidos.php');
        } else {
            header('Location: ../Vistas/mostrar_pedidos.php?borrado=false');
        }
    }

}





$control = new PedidoController;

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'mostrar';
}

switch ($accion) {
    case 'mostrarid':
        $control->mostrar_pedido($_GET['id']);
        break;
    case 'agregar':
        $control->agregar_pedido();
        break;
    case 'mostrar':
        $control->mostrar_pedidos();
        break;
    case 'editar':
        $control->editar_pedido($_GET['id']);
        break;
    case 'borrar':
        $control->borrar_pedido($_GET['id']);
        break;

    default:
        $control->mostrar_pedidos();
        break;
}

?>