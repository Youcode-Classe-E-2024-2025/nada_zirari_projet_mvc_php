<?php

// Autoloading des classes
require_once '../vendor/autoload.php';

// Chargement des fichiers de configuration
require_once '../app/config/config.php';

// Démarrer la session
session_start();

use Dotenv\Dotenv;

// Charger le fichier .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Instanciation du routeur
$router = new App\Core\Router();

// Chargement des routes (nous allons ajouter ici les routes définies dans routes.php)
require_once '../app/config/routes.php';

// Dispatch de la requête
$router->dispatch($_SERVER['REQUEST_URI']);
