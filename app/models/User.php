<?php
namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->query($sql);
    }
}
