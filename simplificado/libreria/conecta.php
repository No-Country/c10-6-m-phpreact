<?php

class ConxSimple {
    private $connection;

    public function __construct($host, $username, $password, $database) {
        $this->connection = new mysqli($host, $username, $password, $database);
        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }

    public function query($sql) {
        $result = $this->connection->query($sql);
        if (!$result) {
            die("Error en la consulta: " . $this->connection->error);
        }
        return $result;
    }

    public function close() {
        $this->connection->close();
    }
}

?>
