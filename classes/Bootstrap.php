<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/12/16
 * Time: 3:30 PM
 */
namespace foxtrot;

class Bootstrap
{
    public $controller = 'landing';
    public $action = 'Index';
    public $params = [];
    public $routing = '';
    public $routs = [
        "" =>                     ['controller' => 'main', 'action' => 'main'],
        "landing" =>              ['controller' => 'main', 'action' => 'index' ],
        "admin-page-dashboard" => ['controller' => 'admin', 'action' => 'dashboard' ],
    ];

    public function dispatch($requestURI)
    {
        if ($requestURI === '') return;
        // prepare URI
        $requestURI = urldecode(trim($requestURI, '/'));

        // query string   www.site.com/controller/action/param1/param2/param3?param4=param5&param6=param7

        // get params after '?'
        parse_str(parse_url($requestURI, PHP_URL_QUERY), $this->params);

        // get path with params devided '/'
        $url = parse_url($requestURI, PHP_URL_PATH);
        $url = explode('/', $url);
        // get params after action
        for ($i = 2; $i <= count($url); $i+=2) {
            if (isset($url[$i])) {
                $this->params[$url[$i]] = (isset($url[$i+1])) ? $url[$i+1] : '';
            }
        }

        $this->routing = implode('/',array_slice($url,0,2));

        if (isset($this->routs[$this->routing])){
            $this->controller = ucfirst($this->routs[$this->routing]['controller']);
            $this->action     = strtolower($this->routs[$this->routing]['action']);
        }

/*        var_dump($this->controller);
        var_dump($this->action);
        exit;*/
    }

    public function run(){
        $controller_name = $this->controller . 'Controller';

    }
}