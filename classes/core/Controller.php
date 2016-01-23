<?php
/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 13-Jan-16
 * Time: 23:49
 */
namespace qwant50\core;
class Controller {

    public $data;
    public $model;
    public $view;

    function __construct($data = [])
    {
        $this->data = $data;
        $this->view = new View();
    }

}