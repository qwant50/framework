<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 23-Jan-16
 * Time: 15:21
 */

namespace qwant50\controllers;

use qwant50\core\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        echo 'actionIndex';
    }
    public function indexAction()
    {
        echo $this->view->render('landing', 'layouts' . DS . 'default');  //page, layout
    }

    public function dashboardAction()
    {
        echo $this->view->render('admin-page-dashboard', 'layouts' . DS . 'default');  //page, layout
    }
}