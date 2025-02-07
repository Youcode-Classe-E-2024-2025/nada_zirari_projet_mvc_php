<?php

// Définition des routes pour le Front Office
$router->addRoute('GET', '/', 'front\HomeController', 'index'); // Page d'accueil
$router->addRoute('GET', '/login', 'front\AuthController', 'login'); // Page de connexion
$router->addRoute('POST', '/login', 'front\AuthController', 'processLogin'); // Traitement de la connexion
$router->addRoute('GET', '/sign-up', 'front\AuthController', 'signUp'); // Page d'inscription
$router->addRoute('POST', '/sign-up', 'front\AuthController', 'processSignUp'); // Traitement de l'inscription

// Route pour la page des articles
$router->addRoute('GET', '/article', 'front\ArticleController', 'index');

// Exemple de route pour le tableau de bord
$router->addRoute('GET', '/dashboard', 'back\DashboardController', 'index'); // Affichage des articles
$router->addRoute('POST', '/dashboard', 'back\DashboardController', 'create'); // Ajouter un article

$router->addRoute('GET', '/dashboard/update/{id}', 'back\DashboardController', 'edit');  // Afficher le formulaire de modification
$router->addRoute('POST', '/dashboard/update/{id}', 'back\DashboardController', 'updateArticle');  // Traiter la mise à jour


// Supprimer un article
$router->addRoute('GET', '/dashboard/delete/{id}', 'back\DashboardController', 'delete'); // Supprimer un article

// Route pour la déconnexion
$router->addRoute('GET', '/logout', 'front\AuthController', 'logout'); // Déconnexion

