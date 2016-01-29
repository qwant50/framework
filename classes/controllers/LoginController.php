<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/29/16
 * Time: 5:49 PM
 */

namespace qwant50\controllers;

use qwant50\core\Controller;
use qwant50\models\indexModel;

class LoginController extends Controller
{

    public function indexAction()
    {
        $this->model = new indexModel();
        //$this->data = $this->model->run($this->params);
        echo $this->view->render('login', 'layouts' . DS . 'default');  //page, layout
    }

    public function dashboardAction()
    {
        $this->model = new indexModel();
        echo $this->view->render('admin-page-dashboard', 'layouts' . DS . 'default');  //page, layout
    }
}
