<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/22/16
 * Time: 6:26 PM
 */

namespace foxtrot\controllers;


use foxtrot\core\Controller;

class AdminpagedashboardController extends Controller
{
    function __construct()
    {
        echo 'AdminpagedashboardController';
        die();
    }
    public function run($controller, $action, $params)
    {
        echo $this->view->render($controller, 'layouts' . DS . 'default');
    }
}