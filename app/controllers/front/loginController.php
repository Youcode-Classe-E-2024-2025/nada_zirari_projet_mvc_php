<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Models\User;

class LoginController extends Controller
{
    // Méthode pour afficher la page de connexion
    public function index()
    {
        $this->render('front.login');
    }

    // Méthode pour traiter la connexion
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vérifier si l'utilisateur existe
            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && $userModel->verifyPassword($password, $user['password'])) {
                // Connexion réussie : rediriger vers la page d'accueil ou le tableau de bord
                $_SESSION['user'] = $user;
                header('Location: /');
                exit();
            } else {
                // Afficher une erreur si la connexion échoue
                $this->render('front.login', ['error' => 'Identifiants incorrects']);
            }
        }
    }

    // Méthode pour se déconnecter
    public function logout()
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}
