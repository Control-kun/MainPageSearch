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
    protected $route;
    protected $view;
    protected $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($this->route);
        $this->model = $this->loadModel($this->route['controller']);
    }


    public function loadModel($name)
    {
        $modelPath = 'App\Models\\' . ucfirst($name);

        if (class_exists($modelPath)){
            return new $modelPath;
        }
    }
}