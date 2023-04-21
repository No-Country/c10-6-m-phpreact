<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'volver';
}

if(!empty($_POST)){
    switch ($accion) {
        case 'agregar':
            if(isset($_POST["producto_id"])){
                $a = 0;
                //agregamos pedido de este produco la cantidad de veces establecida en "cantidad".
                while ($a <= $_POST["cantidad"]) {                            
                    // si es el primer producto simplemente lo agregamos
                    if(empty($_SESSION["cart"])){
                        $_SESSION["cart"]=array( array("producto_id"=>$_POST["producto_id"], "observaciones"=> $_POST["observaciones"], "precio"=> $_POST["precio"]));
                    }else{
                        // a partir del segundo producto:
                        $cart = $_SESSION["cart"];
                        array_push($cart, array("producto_id"=>$_POST["producto_id"],"cantidad"=> $_POST["cantidad"],"observaciones"=> $_POST["observaciones"],"precio"=>$_POST["precio"]));
                        $_SESSION["cart"] = $cart;
                    }
                    $a ++;
                }
            }
            var_dump($_SESSION['cart']);
            exit;
            break;
        case 'eliminar':
            if(!empty($_SESSION["cart"])){
                $cart  = $_SESSION["cart"];
                if(count($cart)==1){ unset($_SESSION["cart"]); }
                else{
                    $newcart = array();
                    foreach($cart as $c){
                        if($c["producto_id"]!=$_POST["producto_id"]){
                            $newcart[] = $c;
                        }
                    }
                    $_SESSION["cart"] = $newcart;
                }
            }
            break;
            case 'pedir':
                if(!empty($_POST)){
                    $q1 = $con->query("insert into cart(client_email,predio,created_at) value(\"$_POST[email]\", $_POST[predio], NOW())");
                    if($q1){
                    $cart_id = $con->insert_id;
                    foreach($_SESSION["cart"] as $c){
                    $q1 = $con->query("insert into cart_product(producto_id,cantidad,observaciones,precio,cart_id) value($c[producto_id],$c[cantidad],\"$c[observaciones]\", $c[precio],$cart_id)");
                    }
                    unset($_SESSION["cart"]);
                    }
                    }
                break;
/*    
        case 'agregar':
            if(isset($_POST["product_id"]) && isset($_POST["q"])){
                // si es el primer producto simplemente lo agregamos
                if(empty($_SESSION["cart"])){
                    $_SESSION["cart"]=array( array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
                }else{
                    // apartir del segundo producto:
                    $cart = $_SESSION["cart"];
                    $repeated = false;
                    // recorremos el carrito en busqueda de producto repetido
                    foreach ($cart as $c) {
                        // si el producto esta repetido rompemos el ciclo
                        if($c["product_id"]==$_POST["product_id"]){
                            $repeated=true;
                            break;
                        }
                    }
                    // si el producto es repetido no hacemos nada, simplemente redirigimos
                    if($repeated){
                        print "<script>alert('Error: Producto Repetido!');</script>";
                    }else{
                        // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
                        array_push($cart, array("product_id"=>$_POST["product_id"],"q"=> $_POST["q"]));
                        $_SESSION["cart"] = $cart;
                    }
                }
                print "<script>window.location='../products.php';</script>";
            }
            break;
        case 'eliminar':
            if(!empty($_SESSION["cart"])){
                $cart  = $_SESSION["cart"];
                if(count($cart)==1){ unset($_SESSION["cart"]); }
                else{
                    $newcart = array();
                    foreach($cart as $c){
                        if($c["product_id"]!=$_GET["id"]){
                            $newcart[] = $c;
                        }
                    }
                    $_SESSION["cart"] = $newcart;
                }
            }
            break;
            case 'pedir':
                if(!empty($_POST)){
                    $q1 = $con->query("insert into cart(client_email,created_at) value(\"$_POST[email]\",NOW())");
                    if($q1){
                    $cart_id = $con->insert_id;
                    foreach($_SESSION["cart"] as $c){
                    $q1 = $con->query("insert into cart_product(product_id,q,cart_id) value($c[product_id],$c[q],$cart_id)");
                    }
                    unset($_SESSION["cart"]);
                    }
                    }
                break; */
        default:
            header("Location: ../publico/index_cliente.php");  
            break;
    }
	header("Location: ../publico/index_cliente.php"); 
}

header("Location: ../publico/index_cliente.php"); 

?>

