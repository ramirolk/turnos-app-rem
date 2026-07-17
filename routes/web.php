<?php

use app\controllers\HomeController;
use app\middleware\AuthMiddleware;

return [

    "GET" => [

        "/" => [
            "controller" => HomeController::class,
            "action" => "index",
            "middleware" => [
                AuthMiddleware::class
            ]
        ]

    ]
];
?>