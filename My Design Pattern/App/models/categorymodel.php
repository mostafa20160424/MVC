<?php
namespace PHPMVC\Models;

use PHPMVC\Models\AbstractModel;

class CategoryModel extends AbstractModel
{
    public $tablename="catigiorise";
    public $tableShema;

    public function __construct(array $args){
        $this->tableShema=$args;
        parent::__construct();
        $this->add($this->tableShema,$this->tablename);
    }
    
}