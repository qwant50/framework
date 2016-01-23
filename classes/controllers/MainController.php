<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 23-Jan-16
 * Time: 15:21
 */

namespace foxtrot\controllers;


use foxtrot\core\Controller;

class MainController extends Controller
{
    function actionIndex()
    {
        echo 'actionIndex';
    }
    public function run($controller, $action)
    {
        echo $this->view->render($controller, 'layouts' . DS . 'default');
    }
}