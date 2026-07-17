<?php

class Router{
    private array $routes;

    public function __construct(array $routes){
        $this->routes = $routes;
    }

    public function dispatch(){
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $route = $this->routes[$method][$uri] ?? null;

        if (!$route) {
            http_response_code(404);
            echo "404 - Ruta no encontrada";
            return;
        }
    }
}
?>