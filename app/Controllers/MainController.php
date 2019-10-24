<?php

namespace App\Controllers;

use App\Core\Controller;

class MainController extends Controller
{

    public function index()
    {
        var_dump($_REQUEST);
        $this->view->render('Главная страница');
    }
}