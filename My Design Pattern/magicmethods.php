<?php

class Test
{
    public $dsn;
    public $name;
    public $pass;
    public $id="20160424";
    public $link;

    public function __construct($dsn,$name,$pass)
    {
        $this->dsn = $dsn;
        $this->name = $name;
        $this->pass = $pass;
        $pdo = new PDO($dsn,$name,$pass);
    }

    public function __sleep()//the benfit of this function is to specify what you want serialize at Class
    {
        return array('name','id');//mean serialize only name,id
    }

    public function __wakeup()
    {
        echo 'Hello';
    }

    public function __toString()
    {
        //this function running when you use echo $object; and $object variable is object from this class will run this function
	//Note:legal when you use echo $object; will print error
    }

    public function __invoke($class)
    {
        echo '<br>Hello From Calling Object Of Class'. $class;
    }
    public function __clone()
    {
        echo '<br> Clone';
    }
}

$test = new Test("mysql:host=localhost;dbname=shop",'root','');

$serialized = serialize($test);//will print class as string like JSON and call function __sleep

var_dump($serialized);

unserialize($serialized);//will call function __wakeup

$test('Test');//to calling __invoke function

$obj = clone($test);//mean $obj = &$test; and execute __clone function

