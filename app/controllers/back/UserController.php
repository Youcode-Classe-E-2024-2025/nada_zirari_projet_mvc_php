<?php

namespace App\Controllers\Back;

use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $userModel = new User();
        $users = $userModel->getAllUsers();
        $this->view('back/users.twig', ['users' => $users]);
    }
}



?>