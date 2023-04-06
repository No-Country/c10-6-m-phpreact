<?php
class ControllerApp
{
    protected $db;
    protected $ruta = array();
    protected $usuario;
    public function __construct()
    {
        $this->setRuta();
        session_start();
    }

    public function conectarBD()
    {
        try {
            $this->db = new PDO('mysql:host=' . SERVER . ';dbname=' . DB, USER, PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function desconectarDB()
    {
        $this->db = null;
    }
    public function getBD()
    {

        return $this->db;
    }
    public function setRuta()
    {
        if (isset($_GET) && !empty($_GET)) {

            if (isset($_GET['controller']) && in_array(strtoupper($_GET['controller']), CONTROLLER)) {
                $this->ruta['controller'] = strtolower($_GET['controller']);
                if (isset($_GET['accion']) && in_array(strtoupper($_GET['accion']), MODEL)) {
                    $this->ruta['accion'] = strtolower($_GET['accion']);
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $this->ruta['id'] = $_GET['id'];
                    }
                }
            } else {
                $this->ruta['controller'] = 'error';
            }
        } else {
            $this->ruta['controller'] = 'cliente';
        }
    }
    public function getRuta()
    {
        return $this->ruta;
    }
    function respuesta($consulta)
    {
        $consulta = json_encode($consulta);
        header("Content-type: application/json; charset=utf-8");
        header("cache-control: must-revalidate");
        header('Content-Length: ' . strlen($consulta));
        header('Vary: Accept-Encoding');
        echo ($consulta);
    }
    public function testMetodo()
    {
        return "METODO PRUEBA";
    }
    public function render($template, $datos, $caseInsensitive = false)
    {
        $file = './view/' . $template . '.html';
        if (!file_exists($file)) {
            die("El archivo <code>$file</code> es inexistente");
        }
        $ci = $caseInsensitive ? 'i' : '';
        $contenido = file_get_contents($file);
        foreach ($datos as $key => $value) {
            $contenido = preg_replace("/{{\s*(" . $key . ")\s*?}}/$ci", $value, $contenido);
        }
        return $contenido;
    }
}
