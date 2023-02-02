<?php

class Item
{
    public function __construct($name, $price, $stock, $sold = 0)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = $sold;

        return $this;
    }

    public function logDetails()
    {
        echo "Name: ".$this->name."<br>";
        echo "Price: ".$this->price."<br>";
        echo "Stock: ".$this->stock."<br>";
        echo "Sold: ".$this->sold."<br>";

        return $this;
    }

    public function buy()
    {
        $this->sold++;
        $this->stock--;

        return $this;
    }

    public function return()
    {
        if($this->sold > 0)
        {
            $this->sold--;
            $this->stock++;
        }
        
        return $this;
    }
}


$obj1 = new Item("Alcohol",33,4);
$obj1->buy()->buy()->buy()->return()->logDetails();

$obj2 = new Item("Pen", 5, 10);
$obj2->buy()->buy()->return()->return()->logDetails();

$obj3 = new Item("Phone",200,90);
$obj3->return()->return()->return()->logDetails();
?>