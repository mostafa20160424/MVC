<?php

namespace PHPMVC\LIB;

class FrontController 
{
    const NOT_FOUND_ACTION = 'NotFoundAction';
    const NOT_FOUND_Controller = 'PHPMVC\Controllers\\'.'NotFoundController';
    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();
    private $_template;

    public function __construct(Template $template)
    {
        $this->_template = $template;
        $this->_parseUrl();
    }

    public function _parseUrl()
    {
        $url=parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH);
        $url=str_replace(['php%20course','MVC%20Mohamed%20Yahia','public'],'',$url);
        //remove folder pathes from $url , $url then = the info you given
        $url=trim($url,'/');
        $url = explode( '/' , $url ,3);

        if(isset($url[0]) && $url[0]!='')
        {
            $this->_controller=$url[0];
        }
        if(isset($url[1]) && $url[1]!='')
        {
            $this->_action=$url[1];
        }
        if(isset($url[2]) && $url[2]!='')
        {
            $this->_params=explode('/',$url[2]);
        }

        /**
        *parse_url($_SERVER['REQUEST_URI'],PHP_URL_QUERY) 
        *return value has request GET
        */

        /**
        **list($this->_rootFolder,$this->_controller,$this->_action,$this->_params) = explode('/',trim($url,'/'),4);
        *we make only array_size =4 because my path has only 3 folders
        *and other info in url is value has Get Request so put it in one index
        *list function equal the value that take and equal it to
        *idexex of array that mean $controller=arr[1],$params=arr[3]
        */

     
    }

    public function dispatch()
    {
        $controllerClassName = 'PHPMVC\Controllers\\'.ucfirst($this->_controller).'Controller';
        $actionName = $this->_action . 'Action';
        if(! class_exists($controllerClassName))
        {
            $controllerClassName = self::NOT_FOUND_Controller;
            $this->_action=$actionName = self::NOT_FOUND_ACTION;
        }
        $controller = new $controllerClassName();
        if(! method_exists($controller , $actionName)){
            $this->_action=$actionName = self::NOT_FOUND_ACTION;
        }

        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->$actionName();//running the function
    }
}