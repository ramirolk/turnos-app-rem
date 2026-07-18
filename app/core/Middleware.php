<?php

//  Clase base para todos los middleware.

//  Todo middleware debe implementar
//  el metodo handle().

namespace app\core;

abstract class Middleware{

    abstract public function handle();
}

?>