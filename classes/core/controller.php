<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 13-Jan-16
 * Time: 23:49
 */


class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {
    }
}