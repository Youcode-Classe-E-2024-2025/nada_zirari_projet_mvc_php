<?php

 
namespace App\Controllers\Front;

use App\Core\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    // Afficher tous les articles
    public function index()
    {
        // Créer une instance du modèle Article
        $articleModel = new Article();
        $articles = $articleModel->findAll(); // Récupère tous les articles

        // Utiliser la méthode render() pour afficher la vue des articles
        $this->render('front/article', ['article' => $articles]);
    }

    // Afficher un article spécifique par son ID
    public function show($id)
    {
        // Créer une instance du modèle Article
        $articleModel = new Article();
        $article = $articleModel->find($id); // Récupère un article par son ID

        // Utiliser la méthode render() pour afficher la vue de l'article
        $this->render('front/article', ['article' => $article]);
    }
}


?>
