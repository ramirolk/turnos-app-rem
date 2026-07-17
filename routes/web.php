<?php

use app\controllers\HomeController;
return [

    "GET" => [

        "/" => [
            "controller" => HomeController::class,
            "action" => "index"
        ]

    ]
];
?>