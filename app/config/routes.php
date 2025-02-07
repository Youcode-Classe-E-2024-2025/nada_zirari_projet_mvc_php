<?php

// Définition des routes pour le Front Office
$router->addRoute('GET', '/', 'front\HomeController', 'index'); // Page d'accueil
$router->addRoute('GET', '/login', 'front\AuthController', 'login'); // Page de connexion
$router->addRoute('POST', '/login', 'front\AuthController', 'processLogin'); // Traitement de la connexion
$router->addRoute('GET', '/sign-up', 'front\AuthController', 'signUp'); // Page d'inscription
$router->addRoute('POST', '/sign-up', 'front\AuthController', 'processSignUp'); // Traitement de l'inscription

// Définition des routes pour le Back Office (Admin)
$router->addRoute('GET', '/admin/dashboard', 'back\DashboardController', 'index'); // Dashboard Admin
$router->addRoute('GET', '/admin/users', 'back\UserController', 'index'); // Gestion des utilisateurs
$router->addRoute('GET', '/admin/articles', 'back\ArticleController', 'index'); // Gestion des articles

// Route pour la déconnexion
$router->addRoute('GET', '/logout', 'front\AuthController', 'logout'); // Déconnexion
