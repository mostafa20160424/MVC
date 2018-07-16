<?php

namespace PHPMVC\LIB;



class Autoload
{
    public static function autoload($className)
    {
        /*remove main namespace because there is no
         folder has name = PHPMVC */
         $className = str_replace('PHPMVC','',$className);
         $className = str_replace('\\','/',$className);
         $className = strtolower($className);
         $className = $className . '.php';
         if(file_exists(APP_PATH.$className)){
            require_once APP_PATH.$className;
         }
         else{
            echo APP_PATH.$className;
         }
         
    }
}

spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');
/**
*spl_autoload_register call its own function autoload 
*when you call any class not exist in same file
*same like magic method __get
*/