<?php

class ConexionDB extends App
{

    /*
    function __construct()
    private $host = SERVER;
    private $username = USER;
    private $password = PASS;
    private $database = DB;
    private $conn;
    private define('DB', array(
        'user'=>'root',
        'pass'=>'',
        'server'=>'localhost:3308'
   */
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Falló la conexión: " . $e->getMessage());
        }
    }
}
