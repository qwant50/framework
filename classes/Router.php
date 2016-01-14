<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */



class Router
{
    public $page;
    public $controller;
    public $model;
    public $view;

    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = DIR_TO_PAGES.$url[2].TEMPLATE_EXTENSION;
        $this->controller = file_exists($file) ? $url[2] : 'error404';

        $view = new View();
        echo $view->render($this->controller,'layouts' . DS . 'default');
    }
}