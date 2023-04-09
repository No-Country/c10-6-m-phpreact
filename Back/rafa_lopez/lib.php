<?php

function verifyRoute($route)
{
    $count = count($route);
    $result = false;
    if (!empty($route) && in_array($route[0], VERSION)) {
        echo array_shift($route);

        //  switch (count($route)) {
        //     case 1:
        //         require_once './views/home.html';
        //         $result = 1;
        //         break;
        //     case 2:
        //         var_dump(in_array($route[1], CONTROLLER));
        //         $result = 2;
        //         break;
        //     case 3:
        //         $result = 3;
        //         break;
        //     case 4:
        //         $result = 4;
        //         break;
        //     default:
        //         //  http_response_code(404);
        //         require_once 'error-404.html';
        //         $result = 0;
        //         break;
        // }

    } else {
        require_once 'error-404.html';
    }
    return $route;
}
