<?php

class Student 
{
    public $name;
    protected $age;
    private $data = array();
    //__set function must take this parameter running when you set value to any class attr not exist or private,protected
    public function __set($name , $value)
    {
        $this->data[$name]=$value;
    }

    //__get function must take this parameter running when you get value of any class attr not exist or private,protected

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)//will running when you call isset function
    {
        
        if(array_key_exists($name,$this->data))
        {
            return true;
        }
        return false;
    }

    public function get($name)
    {
        $value = $this->__get($name);
        return $value;
    }

    //this function running when you call function not exist in the class or private or protected
    public function __call($name,$args)
    {
        echo "<br>the method ".$name." not found";
    }

    //this function running when you call static function not exist in the class or private or protected
    public static function __callStatic($name,$args)
    {
        echo "<br>the static method ".$name." not found";
    }

}

$mostafa = new Student();

$mostafa->age=20;//will call __get function and create property age

$mostafa->salary=6000;

echo $mostafa->get('salary');

echo isset($mostafa->id);//id is key in mostafa object

$mostafa->sy();
$mostafa::Hello();