<?php

namespace App\Controllers;

use App\Core\Controller;

class Search extends Controller
{

    public function index()
    {
        $result = $this->model->getSearchResult();

        $data['items'] = $result;

        $this->view->render('sobaka', $data);
    }
}