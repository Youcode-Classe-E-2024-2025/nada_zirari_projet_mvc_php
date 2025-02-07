<?php
namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    public function getArticle($id)
    {
        $sql = "SELECT * FROM articles WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }
}
