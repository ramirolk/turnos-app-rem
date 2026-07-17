<?php

// Require para cargar la configuración de la DB
require_once __DIR__ . '/../config/database.php';

// Require para cargar las rutas
$routes = require_once __DIR__ . '/../routes/web.php';

require_once __DIR__ . '/../app/core/Router.php';

$router = new Router($routes);

$router->dispatch();

?>