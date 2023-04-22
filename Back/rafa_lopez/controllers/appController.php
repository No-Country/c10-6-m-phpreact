<?php
class AppController
{
    protected $version = false;
    protected $controller = false;
    protected $model = false;
    protected $id = false;
    protected $route = false;
    protected $db;

    public function  __construct()
    {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($request);
        array_pop($request);
        $this->route = $request;
        if (!empty($request) && array_key_exists(0, $request) && in_array(strtoupper($request[0]), VERSION)) {
            $this->version = strtoupper($request[0]);
            $result = true;
            if (array_key_exists(1, $request) && in_array(strtoupper($request[1]), CONTROLLER)) {

                $this->controller = strtoupper($request[1]);
                $result = true;
            }

            if (array_key_exists(2, $request) && in_array(strtoupper($request[2]), MODEL)) {
                $this->model = strtoupper($request[2]);
                $result = true;
            }
            if (array_key_exists(3, $request) && is_numeric($request[3])) {
                $this->id = $request[3];
                $result = true;
            }
        }
    }
    public function getRoute()
    {
        return $this->route;
    }
    public function getVersion()
    {
        return $this->version;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getId()
    {
        return $this->id;
    }
    public function respuesta($consulta)
    {
        $consulta = json_encode($consulta);
        header("Content-type: application/json; charset=utf-8");
        // header("cache-control: must-revalidate");
        header('Content-Length: ' . strlen($consulta));
        header('Vary: Accept-Encoding');
        echo ($consulta);
        exit();
    }
    // Conexión a la base de datos

    public function conectarBD()
    {
        try {
            $this->db = new PDO('mysql:host=' . SERVER . ';dbname=' . DB, USER, PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("SET CHARACTER SET utf8");
            return $this->db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //exit;
        }
    }
    public function desconectarDB()
    {
        $this->db = null;
    }
    public function getConnDB()
    {
        return $this->db;
    }
    public static function loginUser($post, $conn)
    {
        // $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = :usuario AND `pass` = :contrasena LIMIT 1;");
        $stmt = $conn->prepare(" SELECT `id`,`nombre`, `apodo`, `pass`, `email`, `nivel`, `creado`, CASE `nivel`  WHEN 1 THEN 'admin'  WHEN 2 THEN 'mozo'  ELSE 'desconocido'    END AS nivel_texto  FROM `user` WHERE `email` = :usuario AND `pass` = :contrasena LIMIT 1;");
        $stmt->bindParam(':usuario', $_POST['user']);
        $stmt->bindParam(':contrasena', $_POST['pass']);
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user) {
            $stmt = $conn->prepare("INSERT INTO `user_control` (`id`, `tipo`, `user`) VALUES (NULL, '1',?);");
            $_SESSION['admin'] = $user;
            $stmt->execute([$_SESSION['admin']['id']]);
            header('Location: ../../../V1/ADMIN/');
        } else {
            $stmt = $conn->prepare("INSERT INTO `user_control` (`id`, `tipo`, `user`) VALUES (NULL, '6',?);");
            $stmt->execute([5]);
            ob_start();
            echo '<script>window.alert("Credenciales incorrectas!")</script>';
            ob_end_flush();
            header('Location: ../../../V1/ADMIN/');
        }
    }
    public  function logoutUser($conn)
    {
        //  debug($_SESSION);

        $stmt = $conn->prepare("INSERT INTO `user_control` (`id`, `tipo`, `user`) VALUES (NULL, '0',?);");
        $stmt->execute([$_SESSION['admin']['id']]);
        $_SESSION = null;
        session_destroy();
        ob_start();
        echo '<script>window.alert("Salio correctamente !")</script>';
        ob_end_flush();
        header('Location: ../../../V1/ADMIN/');

        //exit();
    }
}
