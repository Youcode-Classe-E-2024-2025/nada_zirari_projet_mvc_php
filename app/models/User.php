<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model
{
    // Attributs utilisateur
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    // Getter pour l'ID
    public function getId()
    {
        return $this->id;
    }

    // Setter pour l'ID
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter pour le nom d'utilisateur
    public function getUsername()
    {
        return $this->username;
    }

    // Setter pour le nom d'utilisateur
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Getter pour l'email
    public function getEmail()
    {
        return $this->email;
    }

    // Setter pour l'email
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter pour le mot de passe
    public function getPassword()
    {
        return $this->password;
    }

    // Setter pour le mot de passe
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter pour le rôle
    public function getRole()
    {
        return $this->role;
    }

    // Setter pour le rôle
    public function setRole($role)
    {
        $this->role = $role;
    }

    // Méthode pour enregistrer un utilisateur
    public function createUser($username, $email, $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT); // Hash du mot de passe
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', $passwordHash);

        return $stmt->execute();
    }

    // Méthode pour récupérer un utilisateur par son email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setId($result['id']);
            $this->setUsername($result['username']);
            $this->setEmail($result['email']);
            $this->setPassword($result['password']);
            $this->setRole($result['role']);
        }

        return $result;
    }

    // Méthode pour vérifier le mot de passe d'un utilisateur
    public function verifyPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}
