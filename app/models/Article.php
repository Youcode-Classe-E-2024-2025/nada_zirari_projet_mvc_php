<?php

namespace App\Models;

use App\Core\Model;
use PDO;

class Article extends Model
{
    // Attributs de l'article
    private $id;
    private $title;
    private $description;
    private $created_at;

    // Getter pour l'ID
    public function getId()
    {
        return $this->id;
    }

    // Setter pour l'ID
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter pour le titre
    public function getTitle()
    {
        return $this->title;
    }

    // Setter pour le titre
    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter pour la description
    public function getDescription()
    {
        return $this->description;
    }

    // Setter pour la description
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // Getter pour la date de création
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    // Setter pour la date de création
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    // Méthode pour ajouter un article
    public function createArticle($title, $description)
    {
        $sql = "INSERT INTO articles (title, description, created_at) VALUES (:title, :description, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);

        return $stmt->execute();
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticles()
    {
        $sql = "SELECT * FROM articles ORDER BY created_at DESC";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer un article par son ID
    public function getArticleById($id)
    {
        $sql = "SELECT * FROM articles WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setId($result['id']);
            $this->setTitle($result['title']);
            $this->setDescription($result['description']);
            $this->setCreatedAt($result['created_at']);
        }

        return $result;
    }

    // Méthode pour modifier un article
    public function updateArticle($id, $title, $description)
    {
        $sql = "UPDATE articles SET title = :title, description = :description WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);

        return $stmt->execute();
    }

    // Méthode pour supprimer un article
    public function deleteArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
