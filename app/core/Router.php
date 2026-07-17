<?php

class Router{
    private array $routes;

    public function __construct(array $routes){
        $this->routes = $routes;
    }

    public function dispatch(){
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );


        $route = $this->routes[$method][$uri] ?? null;


        if (!$route) {

            http_response_code(404);
            echo "404 - Ruta no encontrada";

            return;
        }


        if(
            !isset($route['controller']) ||
            !isset($route['action'])
        ){

            http_response_code(500);
            echo "Error de configuración de ruta";

            return;
        }


        $controller = $route['controller'];
        $action = $route['action'];


        if(!class_exists($controller)){

            http_response_code(500);
            echo "Controller no encontrado: $controller";

            return;
        }


        $controllerInstance = new $controller();


        if(!method_exists($controllerInstance, $action)){

            http_response_code(500);
            echo "Método no encontrado: $action";

            return;
        }


        call_user_func([
            $controllerInstance,
            $action
        ]);
    }
}
?>