<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */



class Router
{
    public $url;
    public $page;
    public $controller = null;
    public $model;
    public $view;

    public function __construct($requestURI)
    {
        $url = $requestURI;
        $url = rtrim($url,'/');
        $url = explode('/', $url);
        //var_dump($url);
        if (!isset($url[3])) $this->page = 'landing';
        else {
            $file = DIR_TO_PAGES.$url[3].TEMPLATE_EXTENSION;
            $this->page = file_exists($file) ? $url[3] : 'error404';
        }
        $this->view = new View();
        echo $this->view->render($this->page,'layouts' . DS . 'default');
    }
}