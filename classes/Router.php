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
    public $controller = null;
    public $model;
    public $view;

    public function __construct()
    {
        $url = $_SERVER["REQUEST_URI"];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        $file = DIR_TO_PAGES.$url[3].TEMPLATE_EXTENSION;
       // var_dump($url);
        $this->page = file_exists($file) ? $url[3] : 'error404';
//echo $this->page;

        $view = new View();
        echo $view->render($this->page,'layouts' . DS . 'default');
    }
}