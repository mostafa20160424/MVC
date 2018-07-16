<?php
//.htaccess use for make any request url go to index.php

namespace PHPMVC;

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Template;

if(! defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}

require_once "..".DS.'App' . DS . 'config' . DS."config.php";

require_once APP_PATH . 'lib' . DS . "Autoload.php";

$template_parts = require_once "..".DS.'App' . DS . 'config' . DS."templateconfig.php";



$template = new Template($template_parts);

$frontcontroller = new FrontController($template);

$frontcontroller->dispatch();
