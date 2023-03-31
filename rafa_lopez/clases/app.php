<?php

class App
{
    protected $host = SERVER;
    protected $username = USER;
    protected $password = PASS;
    protected $database = DB;
    public $conn;
    public $rutas = array();

    function __construct()
    {
        // GLOBAL SETTING
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        if (!session_id()) {
            ini_set('session.gc_maxlifetime', 6);
            ini_set('session.cookie_lifetime', 6);
            ini_set('session.cache_expire', 6);
            session_set_cookie_params(60 * 60  * 24);
            ini_set('session.name', "NO_COUNTRY");
            session_start();
        }
    }
    function setConn()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Falló la conexión: " . $e->getMessage());
        }
    }
    function getConn()
    {
        return $this->conn;
    }
    public function destConn()
    {
        $this->conn = null;
    }
    function setRuta()
    {
        // valida mesa
        if ($_SERVER['REQUEST_METHOD'] == "GET" && in_array($_SERVER['QUERY_STRING'], MESAS)) {
            $this->rutas['mesa'] = $_SERVER['QUERY_STRING'];
        } else {
            $this->rutas['mesa'] = false;
        }
    }
}
