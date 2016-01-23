<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 13-Jan-16
 * Time: 23:49
 */
namespace foxtrot\core;
class Controller {

    public $data;
    public $model;
    public $view;

    function __construct($data = [])
    {
        $this->data = $data;
        $this->view = new View();
    }

    function actionIndex()
    {
        echo 'actionIndex';
    }
    public function run($controller, $action)
    {
        echo $this->view->render($controller, 'layouts' . DS . 'default');
    }
}