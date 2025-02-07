<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Models\User;

class SignUpController extends Controller
{
    // Méthode pour afficher le formulaire d'inscription
    public function index()
    {
        $this->render('front.signUp');
    }

    // Méthode pour traiter le formulaire d'inscription
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vérifier si l'email est déjà pris
            $userModel = new User();
            $existingUser = $userModel->getUserByEmail($email);

            if ($existingUser) {
                // L'email est déjà utilisé
                $this->render('front.signUp', ['error' => 'Email déjà utilisé']);
                return;
            }

            // Créer un nouvel utilisateur
            if ($userModel->createUser($username, $email, $password)) {
                // Rediriger vers la page de connexion
                header('Location: /login');
                exit();
            } else {
                // Afficher une erreur si l'inscription échoue
                $this->render('front.signUp', ['error' => 'Erreur lors de l\'inscription']);
            }
        }
    }
}
