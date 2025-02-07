<?php

namespace App\Core;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render($viewName, $data = [])
    {
        $this->view->render($viewName, $data);
    }
}
