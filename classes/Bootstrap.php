<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */
namespace qwant50;


class Bootstrap
{
    public $baseUrl = null;
    public $controller = 'landing';  // default controller
    public $action = 'Index';  // default action
    public $params = [];

    public function router()
    {
        $requestURI = $_SERVER["REQUEST_URI"];

        if ($requestURI === '/') {
            return;
        }
        // prepare URI
        $requestURI = urldecode(trim($requestURI, '/'));

        // query string   www.site.com/controller/action/key1/value1/key2/value2?key3=value3&key4=value4

        // get params after '?'
        parse_str(parse_url($requestURI, PHP_URL_QUERY), $this->params);

        // get path with params devided '/'
        $url = parse_url($requestURI, PHP_URL_PATH);
        $url = explode('/', $url);
        //  array_shift($url);    //  fix
        //  array_shift($url);      // fix

        if (isset($url[0])) {
            $this->controller = ucfirst(htmlspecialchars($url[0]));
        }
        if (isset($url[1])) {
            $this->action = strtolower(htmlspecialchars($url[1]));
        }

        // get params after action
        for ($i = 2; $i <= count($url); $i += 2) {
            if (isset($url[$i])) {
                $this->params[$url[$i]] = (isset($url[$i + 1])) ? $url[$i + 1] : '';
            }
        }


    }

    public function dispatch()
    {
        $controllerName = 'qwant50\controllers\\' . $this->controller . 'Controller';
        $actionName = $this->action . 'Action';

        if (!class_exists($controllerName)) {
            $controllerName = 'qwant50\controllers\\Error404Controller';
            $actionName = 'indexAction';
        };
        $controllerObj = new $controllerName($this->params);
        if (!method_exists($controllerObj, $actionName)) {
            $actionName = 'indexAction';
        }
        $controllerObj->$actionName();
    }
}
