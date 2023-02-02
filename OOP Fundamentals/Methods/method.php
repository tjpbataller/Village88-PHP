<?php

class MobilePhones
{
    private $number = 33113311;

    public function get_number()
    {
        return $this->number;
    }

    private function factory_number()
    {
        return 20202020;
    }

    public function get_factory_number()
    {
        return $this->factory_number();
    }

    public function set_number($number)
    {
        $this->number = $number;
        return "Number has been updated to: ".$this->number;
    }
}


$obj = new MobilePhones();

echo "Number: ".$obj->get_number()."<br>";

echo "Factory number: ".$obj->get_factory_number()."<br>";

echo $obj->set_number(214);
?>