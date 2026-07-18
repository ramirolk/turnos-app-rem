<?php

//  Autoload personalizado basado en namespaces.

//  Convierte namespaces, como por ejemplo:
//  app\controllers\HomeController
//  en rutas de archivos:
//  app/controllers/HomeController.php


spl_autoload_register(function ($class) {

    $path = str_replace('\\', '/', $class);

    $file = dirname(__DIR__, 2) . '/' . $path . '.php';


    if (file_exists($file)) {
        require_once $file;
    }

});