<?php

namespace App\Core;

class Security
{
    /**
     * Échappe les caractères spéciaux pour éviter les attaques XSS.
     */
    public static function sanitizeInput($data)
    {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Vérifie le token CSRF envoyé dans le formulaire.
     * Ce token est utilisé pour vérifier que la requête provient bien du site et non d'un attaquant.
     */
    public static function checkCsrfToken($token)
    {
        if ($token !== $_SESSION['csrf_token']) {
            die('CSRF token invalid!');
        }
    }

    /**
     * Génère un token CSRF pour être inséré dans un formulaire.
     */
    public static function generateCsrfToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Crée un token aléatoire et sûr
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Prévenir l'injection SQL en utilisant des requêtes préparées avec PDO.
     * Cette fonction est en fait gérée par la classe `Database`, mais vous pouvez l'utiliser comme un rappel général.
     */
    public static function preventSqlInjection($input)
    {
        // On suppose que la méthode prepare() de PDO protège contre l'injection SQL
        return $input;
    }
}
