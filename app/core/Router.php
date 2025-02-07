<?php

namespace App\Core;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require dirname(__DIR__) . '/config/routes.php';
    }

    public function dispatch(string $uri)
    {
        $uri = strtok($uri, '?'); // Supprime les paramètres GET

        if (isset($this->routes[$uri])) {
            [$controller, $method] = $this->routes[$uri];
            $controllerInstance = new $controller();
            call_user_func([$controllerInstance, $method]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
