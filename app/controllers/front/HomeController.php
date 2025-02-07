<?php
namespace App\Controllers\Front;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Logique pour afficher la page d'accueil
        $this->view('front/home');
    }
}
