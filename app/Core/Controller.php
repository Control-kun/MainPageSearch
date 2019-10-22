<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 22.10.2019
 * Time: 22:18
 */

namespace App\Core;


class Controller
{
    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($this->route);
    }

}