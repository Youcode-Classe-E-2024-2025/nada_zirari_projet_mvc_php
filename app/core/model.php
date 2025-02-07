<?php
namespace App\Core;

use App\Core\Database;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->connect()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
