<?php

class Item
{
    public function __construct($name, $price, $stock, $sold = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = $sold;
    }

    public function logDetails()
    {
        echo "Name: ".$this->name."<br>";
        echo "Price: ".$this->price."<br>";
        echo "Stock: ".$this->stock."<br>";
        echo "Sold: ".$this->sold."<br>";
    }

    public function buy()
    {
        $this->sold++;
        $this->stock--;
    }

    public function return()
    {
        if($this->sold > 0)
        {
            $this->sold--;
            $this->stock++;
        }
        
    }
}


$obj1 = new Item("Alcohol",33,4);
$obj1->buy();
$obj1->buy();
$obj1->buy();
$obj1->return();
$obj1->logDetails();

$obj2 = new Item("Pen", 5, 10);
$obj2->buy();
$obj2->buy();
$obj2->return();
$obj2->return();
$obj2->logDetails();

$obj3 = new Item("Phone",200,90);
$obj3->return();
$obj3->return();
$obj3->return();
$obj3->logDetails();
?>