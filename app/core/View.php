<?php
namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View {
    protected $twig;

    public function __construct() {
        // Charger les templates depuis le dossier 'views'
        $loader = new FilesystemLoader(__DIR__ . '/../views');  // Ce chemin doit pointer vers le dossier views
        $this->twig = new Environment($loader, [
            'cache' => false,  // Désactive le cache pendant le développement
        ]);
    }

    public function render($template, $data = []) {
        // Rendu du template, ici 'front.home' signifie 'app/views/front/home.twig'
        echo $this->twig->render($template . '.twig', $data);
    }
}
