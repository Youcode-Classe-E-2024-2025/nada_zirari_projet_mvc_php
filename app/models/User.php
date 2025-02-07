<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    // Propriétés privées
    private $id;
    private $name;
    private $email;
    private $password;

    // Getter pour l'id
    public function getId()
    {
        return $this->id;
    }

    // Setter pour l'id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter pour le nom
    public function getName()
    {
        return $this->name;
    }

    // Setter pour le nom
    public function setName($name)
    {
        $this->name = $name;
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

    // Vérifie si l'email existe déjà
    public function emailExists($email)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    // Ajoute un nouvel utilisateur dans la base de données
    public function addUser($name, $email, $password)
    {
        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Préparation de la requête SQL pour insérer l'utilisateur
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", $hashedPassword);

        // Exécution de la requête
        return $stmt->execute();
    }

    // Récupère un utilisateur par son email
    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch();  // Cela retourne un objet, pas un tableau

        if ($user) {
            $this->setId($user->id);           // Accès à l'objet avec "->" au lieu de "[]"
            $this->setName($user->name);
            $this->setEmail($user->email);
            $this->setPassword($user->password);
        }

        return $user;
    }
}

