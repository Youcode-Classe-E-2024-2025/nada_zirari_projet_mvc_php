<?php
namespace App\Controllers\Front;

use App\Core\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $article = new Article();
        $data = $article->getArticle($id);
        $this->view('front/article', ['article' => $data]);
    }
}
