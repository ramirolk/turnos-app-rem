<?php
namespace app\DAO;

use app\models\User;

class UserDAO{
    
    public function create(User $user): bool{
        $conn = \Database::getConnection();

        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $user->getName(), 
            $user->getEmail(), 
            $user->getPassword()
        ]);
    }

    public function searchByEmail($email): ?User{
        $conn = \Database::getConnection();

        $sql = "SELECT id, nombre, email, password FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if(!$row){
            return NULL;
        } 
        return new User (
            $row['id'],
            $row['nombre'],
            $row['email'],
            $row['password']
        );
    }
}