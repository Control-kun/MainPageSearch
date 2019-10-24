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
    protected $path;
    protected $route;
    protected $layout = 'default';

    /**
     * View constructor.
     * @param $route
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    /**
     * @param $title
     * @param $vars
     */
    public function render($title, $vars = [])
    {
        extract($vars);
        $path = $_SERVER['DOCUMENT_ROOT'] .'/app/views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require $_SERVER['DOCUMENT_ROOT'] .'/app/views/layouts/' . $this->layout . '.php';
        }
    }

}