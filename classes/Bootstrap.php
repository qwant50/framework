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
    public $controller = 'landing';
    public $action = 'Index';
    public $params = [];

    public function dispatch($requestURI)
    {
        if ($requestURI === '') return;
        $url = $requestURI;

        $queryStringStart = strpos($url, '?');
        if ($queryStringStart !== false) {
            $queryString = substr($url, $queryStringStart);
            parse_str(ltrim($queryString, '?'), $this->params['queryString']);
            $url = str_replace($queryString, '', $url);
        }

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
}