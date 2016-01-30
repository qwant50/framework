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
    public $controller = 'landing';  // default controller
    public $action = 'Index';  // default action
    public $params = [];
    public $routing = '';

    public function dispatch($requestURI)
    {
        if ($requestURI === '/') return;
        // prepare URI
        $requestURI = urldecode(trim($requestURI, '/'));

        // query string   www.site.com/controller/action/param1/param2/param3?param4=param5&param6=param7

        // get params after '?'
        parse_str(parse_url($requestURI, PHP_URL_QUERY), $this->params);

        // get path with params devided '/'
        $url = parse_url($requestURI, PHP_URL_PATH);
        $url = explode('/', $url);
      //  array_shift($url);    //  fix
      //  array_shift($url);      // fix

        // get params after action
        for ($i = 2; $i <= count($url); $i+=2) {
            if (isset($url[$i])) {
                $this->params[$url[$i]] = (isset($url[$i+1])) ? $url[$i+1] : '';
            }
        }

        if (isset($url[0])) $this->controller = ucfirst(htmlspecialchars($url[0]));
        if (isset($url[1])) $this->action = strtolower(htmlspecialchars($url[1]));

    }

    public function run(){
        $controllerName = 'qwant50\controllers\\'. $this->controller.'Controller';
        $actionName = $this->action . 'Action';
    //    echo $controllerName;
    //    exit;
        if (!class_exists($controllerName)){
            $controllerName = 'qwant50\controllers\\Error404Controller';
            $actionName = 'indexAction';
        };
        $controllerObj = new $controllerName($this->params);
        if (!method_exists($controllerObj, $actionName)) {
            $actionName = 'indexAction';
        }
        $controllerObj->$actionName();
     //   echo $controllerName;
     //   exit;
    }
}
