<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 1/8/16
 * Time: 4:21 PM
 */
use foxtrot\Bootstrap;

chdir(dirname(__DIR__));

require_once  realpath(__DIR__.DIRECTORY_SEPARATOR.'..') .DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR. 'core'.DIRECTORY_SEPARATOR.'config.php';

require __DIR__ . '/../vendor/autoload.php';

$bootstrap = new Bootstrap();  // default page

$bootstrap->dispatch($_SERVER["REQUEST_URI"]);
$bootstrap->run();