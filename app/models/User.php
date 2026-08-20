<?php
namespace app\models;

class User{
    Private ?int $id;
    Private string $name;
    Private string $email;
    Private string $password;

    public function __construct(?int $id, string $name, string $email,  string $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters

    public function getId(): ?int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

        public function getEmail(): string{
        return $this->email;
    }
    
    public function getPassword(): string{
        return $this->password;
    }

    // Setters

    public function setName(string $name):string {
        $this->name = $name;
    }

    public function setEmail(string $email):string {
        $this->email = $email;
    }

    public function setPassword(string $password):string {
        $this->password = $password;
    }

}