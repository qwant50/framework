<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/29/16
 * Time: 5:02 PM
 */

namespace qwant50\controllers;

use qwant50\core\Controller;


class Error404Controller extends Controller
{
    public function indexAction()
    {
        //$this->model = new indexModel();
        //$this->data = $this->model->run($this->params);
        echo 'Controller: Error404Controller | Action: indexAction<br>';
    }
}