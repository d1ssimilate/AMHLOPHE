<?php

class Router { 

    static $routes = [
        'get' => [
            '/' => ['main.php', 'MainController', 'getIndex'],
            '/catalog/' => ['main.php', 'MainController', 'getCatalog'],
            '/admin' => ['admin.php', 'AdminController', 'authGet'],
        ],
    ];

    static function route() {
        $method = 'get';

        if (!empty($_POST)) $method = 'post';

        $request = explode('?', $_SERVER['REQUEST_URI']);

        $path = Router::$routes[$method][$request[0]];


        if (!$path) {
            echo "404";
            return;
        }

        require_once 'controllers/'.$path[0];

        $controller_name = new $path[1]();
        $func = $path[2];
        $controller_name->$func();
    }
}