<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 22.10.2019
 * Time: 22:14
 */

namespace App\Core;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public function render($title, $vars)
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] .'/app/views/' . $this->path . '.php';
        $content = ob_get_clean();
        require $_SERVER['DOCUMENT_ROOT'] .'/app/views/layouts/' . $this->layout . '.php';
    }

}