<?php
class House
{
    public function __construct($location, $price, $lot, $type)
    {
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;
        if($this->type == "Pre-selling")
        {
            $this->discount = 0.2;
        }
        else
        {
            $this->discount = 0.05;
        }
        $this->price = $this->price - ($this->price*$this->discount);
        
        echo $this->show_all();
    }

    public function show_all()
    {
        return "Location: {$this->location}<br>Price: {$this->price}<br>Lot: {$this->lot}<br>Lot: {$this->type}<br>Discount: {$this->discount}<br>Total Price: {$this->price}<br><br>";
    }
}

$house1 = new House("La Union", 1500000, "100sqm", "Pre-selling");
$house2 = new House("Metro Manila", 1000000, "150sqm", "Ready for Occupancy");
$house3 = new House("Cavite", 2122500000, "15sqm", "Pre-selling");
$house4 = new House("Davao", 4000, "2000sqm", "Pre-selling");
$house5 = new House("Tagaytay", 1523100000, "100sqm", "Ready for Occupancy");

?>