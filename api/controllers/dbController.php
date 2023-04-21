<?php

class DbController
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        // $host = 'localhost:3308';
        // $dbname = 'resto_nocountry';
        // $username = 'root';
        // $password = '';
        // $dsn = "mysql:host=" . SERVER . ";dbname=" . DB . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->connection = new PDO("mysql:host=" . SERVER . ";dbname=" . DB . ";charset=utf8mb4", USER, PASS, $options);
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }
    // patron singleton
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DbController();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection = null;
    }
}
