<?php

namespace App\Controllers\Back;

use App\Core\Controller;
use App\Models\Article;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Afficher tous les articles
        $articleModel = new Article();
        $articles = $articleModel->findAll();
        
        $data = [
            'title' => 'Gestion des articles',
            'articles' => $articles
        ];
        
        $this->render('back/dashboard', $data); // Afficher la vue avec la liste des articles
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Création d'un nouvel article
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['description']);
            $article->setAuthorId(1); // Id de l'auteur à adapter
            $article->setCreatedAt(date('Y-m-d H:i:s'));
            $article->setUpdatedAt(date('Y-m-d H:i:s'));
            $article->create();

            // Rediriger vers la liste des articles après ajout
            header('Location: /dashboard');
            exit();
        }
    }

      // Méthode pour afficher le formulaire de modification d'un article
      public function edit($id)
      {
          $articleModel = new Article();
          $article = $articleModel->find($id);  // Récupérer l'article par son ID
          
          // Vérifiez si l'article existe avant d'afficher la vue
          if ($article) {
              return $this->render('edit_article.twig', ['article' => $article]);  // Affichage du formulaire de modification
          } else {
              echo "Article non trouvé.";
          }
      }
      
      
      public function updateArticle($id)
      {
          // Récupérer les données envoyées par le formulaire
          $title = $_POST['title'];
          $content = $_POST['content'];
          $updated_at = date('Y-m-d H:i:s'); // Date actuelle pour la mise à jour
      
          // Créer une instance de l'article à modifier
          $article = new Article();
          $article->setId($id);
          $article->setTitle($title);
          $article->setContent($content);
          $article->setUpdatedAt($updated_at);
      
          // Appeler la méthode update pour mettre à jour l'article
          if ($article->update()) {
              // Rediriger vers la liste des articles ou afficher un message de succès
              header('Location: /dashboard');
              exit();
          } else {
              // Afficher un message d'erreur en cas d'échec
              echo 'Échec de la mise à jour de l\'article.';
          }
      }
      


    public function delete($id)
    {
        // Supprimer l'article
        $article = new Article();
        $article->setId($id);
        $article->delete();

        // Rediriger vers la liste des articles après suppression
        header('Location: /dashboard');
        exit();
    }
}
