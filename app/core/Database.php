<?php
namespace App\Core;

use PDO;

class Database
{
    private $host = 'localhost';
    private $db   = 'nom_base';
    private $user = 'utilisateur';
    private $pass = 'motdepasse';
    private $charset = 'utf8';

    public function connect()
    {
        $dsn = "pgsql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            return new PDO($dsn, $this->user, $this->pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
