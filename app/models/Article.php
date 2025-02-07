<?php

namespace App\Models;

use App\Core\Model; // Assurez-vous que la classe Model est bien importée pour hériter de la classe de base

class Article extends Model
{
    // Propriétés privées
    private $id;
    private $title;
    private $content;
    private $author_id;
    private $created_at;
    private $updated_at;

    // Getter et Setter pour l'id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter et Setter pour le titre de l'article
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter et Setter pour le contenu de l'article
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // Getter et Setter pour l'ID de l'auteur
    public function getAuthorId()
    {
        return $this->author_id;
    }

    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
    }

    // Getter et Setter pour la date de création
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    // Getter et Setter pour la date de mise à jour
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    // Méthode pour récupérer tous les articles
    public function findAll()
    {
        // Préparer la requête SQL
        $stmt = $this->db->prepare("SELECT * FROM articles");
        $stmt->execute();

        // Retourner tous les articles sous forme de tableau associatif
        return $stmt->fetchAll();
    }

    // Méthode pour récupérer un article par son ID
    public function find($id)
    {
        // Préparer la requête SQL pour récupérer un article spécifique
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        // Si l'article est trouvé, retourner ses données sous forme de tableau associatif
        return $stmt->fetch();
    }

    // Méthode pour créer un nouvel article dans la base de données
    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content, author_id, created_at, updated_at)
                                    VALUES (:title, :content, :author_id, :created_at, :updated_at)");

        // Bind des valeurs des propriétés de l'article
        $stmt->bindValue(':title', $this->getTitle());
        $stmt->bindValue(':content', $this->getContent());
        $stmt->bindValue(':author_id', $this->getAuthorId());
        $stmt->bindValue(':created_at', $this->getCreatedAt());
        $stmt->bindValue(':updated_at', $this->getUpdatedAt());

        // Exécution de la requête pour insérer l'article dans la base de données
        return $stmt->execute();
    }

    // Méthode pour mettre à jour un article existant dans la base de données
    public function update()
    {
        $stmt = $this->db->prepare("UPDATE articles SET title = :title, content = :content, updated_at = :updated_at WHERE id = :id");
    
        // Bind des valeurs des propriétés de l'article
        $stmt->bindValue(':title', $this->getTitle());
        $stmt->bindValue(':content', $this->getContent());
        $stmt->bindValue(':updated_at', $this->getUpdatedAt());
        $stmt->bindValue(':id', $this->getId());
    
        // Exécution de la requête pour mettre à jour l'article dans la base de données
        return $stmt->execute();
    }
    

    // Méthode pour supprimer un article de la base de données
    public function delete()
    {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->bindValue(':id', $this->getId());
        return $stmt->execute();
    }
}
