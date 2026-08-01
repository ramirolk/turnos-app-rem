<?php

namespace app\middleware;

use app\core\Middleware;

class AuthMiddleware extends Middleware{

    public function handle(){
        echo "Middleware ejecutado <br>";
    }

}