<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */
namespace foxtrot;
use foxtrot\core\View;
class Bootstrap
{
    public $url;
    public $controller = 'landing';
    public $action = 'Index';
    public $view;
    public $params = [];

    public function dispatch($requestURI)
    {
        $url = $requestURI;
        $url = trim($url, '/');
        $url = explode('/', $url);
       // var_dump($url);

        if (isset($url[2])) {
            $file = DIR_TO_PAGES . $url[2] . TEMPLATE_EXTENSION;
            $this->controller = file_exists($file) ? $url[2] : 'error404';
        };
        if (isset($url[3])) {
            $this->action = $url[3];
        };

    }
    public function run(){
        $this->view = new View();
        echo $this->view->render($this->controller, 'layouts' . DS . 'default');
    }
}