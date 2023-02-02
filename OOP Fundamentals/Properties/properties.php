<?php

class Vape
{
    public $color = "red";
    public $battery = "300 hours";
    public $max_power = 200;

    public function release_vapor()
    {
        return "Vapor released";
    }

}

$ted_vape = new Vape();

echo $ted_vape->battery;

var_dump($ted_vape);