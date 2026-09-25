<?php

namespace app\controllers;

use app\DAO\UserDAO;
use app\models\User;

class AuthController{
    Private UserDAO $UserDAO;

    public function __construct(){
        $this->UserDAO = new UserDAO();
    }
// Verificacion de datos (POST)
    public function register(): void{
        $name = trim($_POST["name"]?? "");
        $email = trim($_POST["email"]?? "");
        $password = trim($_POST["password"]?? "");
        // Verificamos campos vacios
        if(empty($name) || empty($email) || empty($password)){
            die ("Todos los campos son obligatorios");
        }
        // Verificamos email valido
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die ("Correo electronico no valido");
        }
        // Verificamos si el usuario esta registrado
        if($this->UserDAO->searchByEmail($email) !== NULL){
            die ("Email ya registrado");
        }
        // Hash de contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        // Creamos el objeto y le damos las propiedades
        $user = new User(null, $name, $email, $passwordHash);
        // Ejecutamos el metodo create sobre el objeto user creado
        $this->UserDAO->create($user);

        header("Location: login");
        exit;
    }

    public function login(): void{
        $email = trim($_POST['email']?? "");
        $password = trim($_POST['password']?? "");

        if (empty($email) || empty($password)){
            die ("Todos los campos son obligatorios");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die ("Correo no valido");
        }

        $user = $this->UserDAO->searchByEmail($email);

        if ($user == NULL){
            die("Correo o contraseña incorrecto"); 
        }

        if (!password_verify($password, $user->getPassword())){
            die ("Correo o contraseña incorrecto");
        }

        $_SESSION["user_id"] = $user->getId();
        $_SESSION["user_name"] = $user->getName();
        $_SESSION["user_email"] = $user->getEmail();

        die ("BIENVENIDO");
        exit;
    }

// Vistas de la pagina de registro y de login (GET)
    public function showLoginForm()
    {
        require_once __DIR__ . '/../views/auth/Login.php';
    }
    public function showRegisterForm()
    {
        require_once __DIR__ . '/../views/auth/Register.php';
    }
};