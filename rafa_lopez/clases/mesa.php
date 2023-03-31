<?php

class Mesa extends App
{
    private $mesa;
    private $pedidos = array();
    function __construct($mesa)
    {
        $this->mesa = $mesa;
    }
    function getMesa()
    {
        var_dump($this->mesa);
    }
}
