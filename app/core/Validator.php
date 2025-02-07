<?php

namespace App\Core;

class Validator
{
    // Vérifie si une chaîne est vide
    public function isEmpty($value)
    {
        return empty($value);
    }

    // Vérifie si l'email est valide
    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Vérifie la longueur du mot de passe
    public function isValidPassword($password)
    {
        return strlen($password) >= 6; // Exemple de validation pour un mot de passe minimum de 6 caractères
    }

    // Vérifie si les mots de passe correspondent
    public function passwordsMatch($password, $passwordConfirmation)
    {
        return $password === $passwordConfirmation;
    }
}
