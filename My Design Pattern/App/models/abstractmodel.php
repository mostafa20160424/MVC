<?php
namespace PHPMVC\Models;
class AbstractModel
{
    private $con=null;
    public function __construct()
    {
        if(! $this->con){
            $this->con = require "connect.php";
        }
    }


    public function add(array $tableShema,$tablename)
    {
        $keys=array();
        $values=array();
        foreach($tableShema as $key=>$value)
        {
            $val="'$value'";
            array_push($keys,$key);
            array_push($values,$val);
        }

            $keysString = implode(',',$keys);
            $valuesString = implode(',',$values);
            $sql="INSERT INTO ".$this->tablename."(".$keysString.") VALUES(".$valuesString.")";
            $stmt=$this->con->prepare($sql);
            $stmt->execute();
    }
}
