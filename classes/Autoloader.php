<?php

/**
 * Created by PhpStorm.
 * User: Qwant
 * Date: 11-Jan-16
 * Time: 18:56
 */
Class Autoloader
{
    protected static $prefix = '';  // progect's prefix

    public static function myAutoload($class)
    {
        $len = strlen(self::$prefix);
        if (strncmp(self::$prefix, $class, $len) !== 0) return; // Progect's prefix detector
        $relative_class = substr($class, $len); // Get class name

        $pathes = ['', 'core'.DS, 'controllers'.DS, 'models'.DS, 'views'.DS];

        foreach ($pathes as $path):
            $fileName = DIR_TO_CLASSES . $path. str_replace('\\', DS, $relative_class) . ".php";
            if (file_exists($fileName)) {
                require_once $fileName;
                return;
            }
        endforeach;
    }
}