<?php

/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 14-Jan-16
 * Time: 10:08
 */
namespace qwant50\core;
class View
{
    //public $template_view; // здесь можно указать общий вид по умолчанию.
    public $content = '';
    public $dir_phtml = '';

    public function __construct() {
        $this->dir_phtml = DIR_TO_PAGES;
    }

    function render($content_view, $template_view, $data = null)
    {
        ob_start();
        require_once $this->dir_phtml . $content_view . TEMPLATE_EXTENSION;
        $this->content = ob_get_clean();

        require_once $this->dir_phtml . $template_view . TEMPLATE_EXTENSION;
        return ob_get_clean();

    }
}