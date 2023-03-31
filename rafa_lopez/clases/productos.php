<?php

class Productos extends App
{
    function getConn()
    {
        var_dump($this->conn);
        echo json_encode($this->conn);
    }
}
