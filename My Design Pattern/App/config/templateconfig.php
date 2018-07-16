<?php

return [
    'template' => [
        'heaer'     =>  TEMPLATE_PATH . 'header.php',
        'footer'    =>  TEMPLATE_PATH . 'footer.php',
        ':view'     =>  ':action_view'
    ],
    'header_resources' => [
        'css'=>[
            'Bootstrap-css' => CSS. 'bootstrap.min.css',
            'Hover'         => CSS . 'hover.css',
            'Main'          => CSS . 'main.css'
        ],
        'js'=>[
            'html5shilv'    => JS . 'html5shiv.min.js',
            'respond'       => JS . 'respond.min.js'
        ]
    ],
    'footer_resources' => [
            'Jquery'        => JS . 'jquery-3.1.1.min.js',
            'Bootstrap-js'  => JS . 'bootstrap.min.js',
            'main'          => JS . 'main.js'
    ]
];