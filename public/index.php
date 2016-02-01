<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/8/16
 * Time: 4:21 PM
 */
use qwant50\Bootstrap;


require_once  dirname(__DIR__) . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

require __DIR__ . '/../vendor/autoload.php';


$app = new Bootstrap();  // default page

$app->router();

$app->dispatch();




