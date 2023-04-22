<?php
class ApiController
{

    private $version;
    private $controller;
    private $route;
    public function setController()
    {
        $request = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($request);
        array_pop($request);
        $this->route = $request;
        $this->version = $this->route[0];
        $this->controller = $this->route[1];
    }
    public function getRoute()
    {
        return $this->route;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function setVersion($version)
    {

        $count = count($version);
        $result = false;
        if (!empty($version) && in_array($version[0], VERSION)) {
            $this->version = $version[0];
            $result = true;
        }
        return $result;
    }
    public function includeController($key)
    {
    }

    public function verifyController($controller)
    {
        return $controller;
    }
}
 //         echo array_shift($route);

            //         //  switch (count($route)) {
            //         //     case 1:
            //         //         require_once './views/home.html';
            //         //         $result = 1;
            //         //         break;
            //         //     case 2:
            //         //         var_dump(in_array($route[1], CONTROLLER));
            //         //         $result = 2;
            //         //         break;
            //         //     case 3:
            //         //         $result = 3;
            //         //         break;
            //         //     case 4:
            //         //         $result = 4;
            //         //         break;
            //         //     default:
            //         //         //  http_response_code(404);
            //         //         require_once 'error-404.html';
            //         //         $result = 0;
            //         //         break;
            //         // }

            //     } else {
            //         require_once 'error-404.html';