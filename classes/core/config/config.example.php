<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('__ROOT__', dirname(dirname(dirname(__DIR__))) . DS);
define('DIR_TO_PAGES', __ROOT__ . 'pages' . DS);
define('TEMPLATE_EXTENSION', '.phtml');

// #SetEnv APP_ENV dev  in httpd.conf
// require_once 'config'. DS. getenv('APP_ENV');