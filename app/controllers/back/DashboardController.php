<?php
namespace App\Controllers\Back;

use App\Core\Controller;

class DashboardController extends Controller {
    public function index() {
        $this->view('back/dashboard.twig');
    }
}



?>