<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */
namespace qwant50;

use qwant50\controllers\MainController;

class Bootstrap
{
    public $controller = 'landing';  // default controller
    public $action = 'Index';  // default action
    public $params = [];
    public $routing = '';
    public $routs = [
        "" =>                     ['controller' => 'main', 'action' => 'main'],
        "landing" =>              ['controller' => 'main', 'action' => 'index' ],
        "admin-page-dashboard" => ['controller' => 'main', 'action' => 'dashboard' ],
    ];

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
        array_shift($url);    //  fix
        array_shift($url);      // fix

        // get params after action
        for ($i = 2; $i <= count($url); $i+=2) {
            if (isset($url[$i])) {
                $this->params[$url[$i]] = (isset($url[$i+1])) ? $url[$i+1] : '';
            }
        }

        $this->routing = implode('/',array_slice($url,0,2));

        if (isset($this->routs[$this->routing])) {
            $this->controller = ucfirst($this->routs[$this->routing]['controller']);
            $this->action     = strtolower($this->routs[$this->routing]['action']);
        }

 /*       var_dump($url);
        array_shift($url);
        var_dump($url);
        var_dump($this->controller);
        var_dump($this->action);
        exit;*/
    }

    public function run(){
        $controllerName = 'qwant50\controllers\\'. $this->controller.'Controller';
        $actionName = $this->action . 'Action';
        if (!class_exists($controllerName)){
            $controllerName = 'qwant50\controllers\\Error404Controller';
            $actionName = 'indexAction';
        };
        $controllerObj = new $controllerName($this->params);
        if (!method_exists($controllerObj, $actionName)) {
            $actionName = 'indexAction';
        }
        $controllerObj->$actionName();
        var_dump($controllerName);
       // exit;
    }
}
