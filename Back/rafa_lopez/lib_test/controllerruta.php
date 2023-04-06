<?php
class ControllerRuta extends controllerApp
{

    public function setRuta()
    {
        if (isset($_GET) && !empty($_GET)) {

            if (isset($_GET['controller']) && in_array(strtoupper($_GET['controller']), CONTROLADOR)) {
                $this->ruta['controller'] = $_GET['controller'];
                if (isset($_GET['accion']) && in_array(strtoupper($_GET['accion']), ACCION)) {
                    $this->ruta['accion'] = $_GET['accion'];
                    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                        $this->ruta['id'] = $_GET['id'];
                    }
                }
            } else {
                $this->ruta['controller'] = 'error';
            }
        } else {
            $this->ruta['controller'] = 'home';
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
}
