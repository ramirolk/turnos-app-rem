<?php

namespace app\controllers;

class AuthController
{
    public function index()
    {
        require_once __DIR__ . '/../views/auth/login.php';
    }
}