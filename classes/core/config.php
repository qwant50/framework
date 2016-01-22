<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/8/16
 * Time: 6:23 PM
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('__ROOT__', realpath(__DIR__.DS.'..'.DS.'..').DS);
define('DIR_TO_CLASSES', __ROOT__.'classes'. DS);
define('DIR_TO_PAGES', __ROOT__.'pages'.DS);
define('TEMPLATE_EXTENSION', '.phtml');

// #SetEnv APP_ENV dev  in httpd.conf
// require_once 'config'. DS. getenv('APP_ENV');