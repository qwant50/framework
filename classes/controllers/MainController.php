<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 23-Jan-16
 * Time: 15:21
 */

namespace qwant50\controllers;

use qwant50\core\Controller;
use qwant50\models\indexModel;

class MainController extends Controller
{

    public function indexAction()
    {
        $this->model = new indexModel();
        //$this->data = $this->model->run($this->params);
        echo $this->view->render('landing', 'layouts' . DS . 'default');  //page, layout
    }

    public function dashboardAction()
    {
        $this->model = new indexModel();
        echo $this->view->render('admin-page-dashboard', 'layouts' . DS . 'default');  //page, layout
    }
}
