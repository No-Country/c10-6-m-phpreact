<?php
class RouteController
{
    public static $route;
    public static function route()
    {
        $ruta = array();
        $request_uri = strtoupper($_SERVER['REQUEST_URI']);
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($request_uri, PHP_URL_PATH);
        $route = explode('/', $path);
        key_exists(0, $route) &&  $route[0] === '' ? array_shift($route) : false;
        key_exists(0, $route) &&  $route[0] === 'api' ? array_shift($route) : false;
        key_exists(0, $route) &&   !in_array(($route[0]), VERSION) ? array_shift($route) : false;
        key_exists(count($route) - 1, $route) &&  $route[0] === '' ? array_pop($route) : false;

        key_exists(0, $route) &&   in_array(($route[0]), VERSION) ? $ruta['version'] = $route[0] : $ruta['version'] = false;
        key_exists(1, $route) &&   in_array(($route[1]), CONTROLLER) ? $ruta['controller'] = $route[1] : $ruta['controller'] = false;
        key_exists(2, $route) &&   in_array(($route[2]), MODEL) ? $ruta['model'] = $route[2] : $ruta['model'] = false;
        key_exists(3, $route) &&   is_numeric($route[3]) ? $ruta['id'] = $route[3] : $ruta['id'] = false;
        $route = null;
        self::$route = $ruta;
        return $ruta;
    }
}
