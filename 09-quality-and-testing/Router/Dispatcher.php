<?php
namespace App\Router;

class Dispatcher {
    private $routes;

    public function __construct(array $routes) {
        $this->routes = $routes;
    }

    public function dispatch($uri, $method) {
       
        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            echo "404 - Rota não encontrada";
            return;
        }

        $route = $this->routes[$uri];

        
        if ($route['method'] !== $method) {
            http_response_code(405);
            echo "405 - Método não permitido";
            return;
        }

       
        if (isset($route['middleware'])) {
            $middleware = new $route['middleware']();
            $middleware->handle(); 
        }
        
        $controllerName = $route['controller'];
        $action = $route['action'];

        $controller = new $controllerName();
        $controller->$action();
    }
}
