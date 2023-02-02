<?php

class MobilePhones
{
    public $model = 991236548236;
    public function _get()
    {
        return "Hello world!";
    }
}

$obj1 = new MobilePhones();
$obj2 = new MobilePhones();

echo $obj1->_get()."<br>";
echo $obj2->model."<br>";
$obj2->model = 444;
echo $obj2->model;

?>