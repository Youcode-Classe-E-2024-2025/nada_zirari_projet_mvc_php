<?php
require_once '../app/core/Router.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Model.php';

// Chargement de la configuration
require_once '../app/config/config.php';

// Démarrer la session
session_start();

$router = new Router();
$router->run();
