<?php

namespace App\Controllers;


use App\Core\Controller;

class Search extends Controller
{
    public function index()
    {
        $this->view->render('sobaka', []);
    }
}