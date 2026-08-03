<?php
// Gestiona el enrutamiento de peticiones PHP
// Se encarga de resolver la petición HTTP actual, ejecutar los middleware asociados 
// y delegar la ejecución al controlador correspondiente.


class Router{
    private array $routes;

    public function __construct(array $routes){
        $this->routes = $routes;
    }


//  Procesa la petición actual:
//  Obtiene método HTTP y URI.
//  Busca la ruta configurada.
//  Ejecuta middleware asociados.
//  Ejecuta el controlador y acción correspondiente.
 

    public function dispatch(){
        
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Normalizamos la URI para eliminar el path base del proyecto.
        // Permite que el Router funcione independientemente de la configuración del entorno.
        
        $basePath = dirname($_SERVER['SCRIPT_NAME']);

        if ($basePath !== '/') {
            $uri = str_replace($basePath, '', $uri);
        }

        // Garantiza que todas las rutas tengan el formato "/ruta"
        $uri = '/' . trim($uri, '/');
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

        if(isset($route['middleware'])){

            foreach($route['middleware'] as $middleware){

            $middlewareInstance = new $middleware();

            $middlewareInstance->handle();

            }
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