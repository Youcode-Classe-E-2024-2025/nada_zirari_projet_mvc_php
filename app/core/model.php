<?php

namespace App\Core;

use PDO;

class Model
{
    protected $db;

    public function __construct()
    {
        // Connexion à la base de données via PDO
        $this->db = Database::getInstance()->getConnection();
    }

    // Méthode pour exécuter une requête SQL sans retour
    protected function executeQuery($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Méthode pour récupérer une seule ligne (ex: un utilisateur par son email)
    protected function fetchOne($sql, $params = [])
    {
        $stmt = $this->executeQuery($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer plusieurs lignes (ex: articles)
    protected function fetchAll($sql, $params = [])
    {
        $stmt = $this->executeQuery($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
