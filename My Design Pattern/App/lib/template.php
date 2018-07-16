<?php

namespace PHPMVC\LIB;

class Template
{
    private $template_parts;
    private $action_view;
    private $data;
    public function __construct(array $parts)
    {
        $this->template_parts = $parts;
    }

    public function setActionView($action_view)
    {
        $this->action_view = $action_view;
    }

    public function setData($data)
    {
        $this->data = $data;
    
    }

    public function renderApp()
    {
        
        $parts = $this->template_parts['template'];
        require_once TEMPLATE_PATH.'templateheaderstart.php';
        $css = $this->template_parts['header_resources']['css'];
        $js   = $this->template_parts['header_resources']['js'];
        $output = '';
        foreach($css as $cssKey => $path)
        {
             $output .= '<link href="'.$path.'" rel="stylesheet">'; 
        
        }
        
        foreach($js as $jsKey => $path)
        {
            $output .= '<script src="'.$path.'" ></script>'; 
        }
        
        echo $output;

        require_once TEMPLATE_PATH.'templateheaderend.php';

        require_once TEMPLATE_PATH.'header.php';
        
        foreach($parts as $key=>$value)
        {
            if($key === ':view')
            {
                require_once $this->action_view;
            }
        }

     $js   = $this->template_parts['footer_resources'];
     $output2 = '';
        foreach($js as $jsKey => $path)
        {
            $output2 .= "<script src='$path' ></script>"; 
        }
        echo $output2;
        require_once TEMPLATE_PATH.'footer.php';
    }
}