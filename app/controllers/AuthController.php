<?php

namespace app\controllers;

class AuthController
{

// Vistas de la pagina de registro y de login
    public function showLoginForm()
    {
        require_once __DIR__ . '/../views/auth/Login.php';
    }
    public function showRegisterForm()
    {
        require_once __DIR__ . '/../views/auth/Register.php';
    }

}