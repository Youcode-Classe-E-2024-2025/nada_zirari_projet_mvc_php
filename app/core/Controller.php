<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(dirname(__DIR__) . '/views');
        $this->twig = new Environment($loader);
    }

    protected function render(string $view, array $data = [])
    {
        echo $this->twig->render($view . '.twig', $data);
    }
}
