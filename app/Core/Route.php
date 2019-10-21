<?php

namespace App\Core;

class Route
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $routesArr = [
            '' => [
                'controller' => 'main',
                'action' => 'index'
            ],
            'search' => [
                'controller' => 'search',
                'action' => 'index'
            ],
        ];

        foreach ($routesArr as $key => $value){
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;

    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if($this->match()){
            $controller = 'app\Controllers\\' . ucfirst($this->params['controller'] . '.php');
            if (!class_exists(ucfirst($this->params['controller'] . '.php'))){
                echo 'Class not found.';
            }
        }
    }

}