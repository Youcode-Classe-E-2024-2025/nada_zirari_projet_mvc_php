<?php

namespace App\Core;

class Session
{
    // Démarre une session si elle n'est pas déjà active
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Stocke un message dans la session
    public static function setMessage($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    // Récupère un message depuis la session
    public static function getMessage($key)
    {
        if (isset($_SESSION[$key])) {
            $message = $_SESSION[$key];
            unset($_SESSION[$key]);
            return $message;
        }
        return null;
    }

    // Stocke l'utilisateur dans la session
    public static function setUser($user)
    {
        $_SESSION['user'] = $user;
    }

    // Récupère l'utilisateur de la session
    public static function getUser()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }

    // Détruit la session (pour la déconnexion)
    public static function destroy()
    {
        session_destroy();
    }
}
