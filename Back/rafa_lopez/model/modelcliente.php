<?php
require_once('./view/vistacliente.html');
debug(__FILE__);
echo <<<msg
    <h3>cliente y mesa son sinonimos, pero con diferentes accesos</h3>
    <p>Mesa, accede x GET sin identificaral cliente</p>
    <p>cliente ingresapor GET la primera vez, luego usa cookie, difrecia pedido segun quienes</p>
    <p>devuelve datos para renderizar vista cliente</p>
    <p>menu con MENUS, PEDIDOS, LLAMAR MOZO, PAGAR</p>

    msg;
