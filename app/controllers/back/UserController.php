<?php
namespace App\Controllers\Back;

use App\Core\Controller;

class UserController extends Controller
{
    public function list()
    {
        // Logique pour lister les utilisateurs
        $this->view('back/users');
    }
}
