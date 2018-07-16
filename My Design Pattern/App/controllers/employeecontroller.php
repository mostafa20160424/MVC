<?php

namespace PHPMVC\Controllers;
use PHPMVC\MODELS\EMPLOYEEMODEL;

class EmployeeController extends AbstractController
{
    public function defaultAction()
    {
        $this->_view();
    }

    public function AddAction()
    {
        $this->_view();
        print_r( $this->getParams());
    }
}