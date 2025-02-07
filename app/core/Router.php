<?php

namespace App\Core;

class Router
{
    private $routes = [];

    // Enregistrement des routes
    public function addRoute($method, $route, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    // Dispatch (dispatching) des requêtes
    public function dispatch($url)
    {
        // Suppression de la partie du chemin public
        $url = str_replace('/projet-mvc-php/public', '', $url);
        
        // Recherche de la route correspondante
        foreach ($this->routes as $route) {
            if ($_SERVER['REQUEST_METHOD'] == $route['method'] && $url == $route['route']) {
                // Instanciation du contrôleur et appel de l'action
                $controllerName = 'App\Controllers\\' . $route['controller'];
                $controller = new $controllerName();
                $controller->{$route['action']}();
                return;
            }
        }

        // Si aucune route ne correspond
        echo "Page not found!";
    }
}
