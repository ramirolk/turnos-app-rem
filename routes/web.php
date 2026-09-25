<?php

//  Definición de rutas de la aplicación.
 
//  Cada ruta contiene:
//   - controller: clase encargada de procesar la petición.
//   - action: método que será ejecutado.
//   - middleware: capas opcionales que se ejecutan antes.

use app\controllers\HomeController;
use app\controllers\AuthController;
use app\middleware\AuthMiddleware;

return [

    "GET" => [

        "/" => [
            "controller" => HomeController::class,
            "action" => "index",
            "middleware" => [
                AuthMiddleware::class
            ]
        ],

        "/login" => [
            "controller" => AuthController::class,
            "action" => "showLoginForm"
        ],
        "/register" => [
            "controller" => AuthController::class,
            "action" => "shoWRegisterForm"
        ]
    ],

    "POST" => [
        "/register" => [
            "controller" => AuthController::class,
            "action" => "register"
        ],
        "/login" => [
            "controller" => AuthController::class,
            "action" => "login"
        ]
    ]
];
?>