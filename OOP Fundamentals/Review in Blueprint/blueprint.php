<?php
class MobilePhone
{
    private $sim_number = 999;
    public $model_number = 98371;

    public function __construct()
    {
        echo "I've been called";
        $this->color = "red";
    }

    public function __set($property, $value)
    {
        if(property_exists($this, $property))
        {
            $this->property = $value;
        }
        return $this;
    }

    public function __get($property)
    {
        if(property_exists($this, $property))
        {
            return $this->property;
        }
    }
}


$obj1 = new MobilePhone();
$obj1->__set($obj1->sim_number, 13123);
echo $obj1->__get($obj1->sim_number);
?>