<?php

class Character
{

 
    public function __construct($name = "Character", $health = 100, $stamina = 100, $manna = 100)
    {
        $this->name = $name;
        $this->health = $health;
        $this->stamina = $stamina;
        $this->manna = $manna;
    }
    
    public function walk()
    {
        if($this->stamina > 0)
        {
            $this->stamina--;
        }
        return $this;
    }
    public function run()
    {
        if($this->stamina > 0)
        {
            $this->stamina -= 3;
        }
        return $this;
    }
    public function showStats()
    {
        echo "Name: $this->name<br>Health: $this->health<br>Stamina: $this->stamina<br>Manna: $this->manna<br><br>";
        return $this;
    }
}

$character = new Character();
$character->walk();
$character->walk();
$character->walk();
$character->run();
$character->run();
$character->showStats();

class Shaman extends Character
{
    public $health = 150;
    
    public function heal()
    {
        if($this->health < 150)
        {
            $this->health += 5;
        }
        if($this->stamina < 100)
        {
            $this->stamina += 5;
        }
        if($this->manna < 100)
        {
            $this->manna += 5;
        }
        return $this;
    }
}

$shaman = new Shaman("Shaman");
$shaman->walk();
$shaman->walk();
$shaman->walk();
$shaman->run();
$shaman->run();
$shaman->heal();
$shaman->showStats();

class Swordsman extends Character
{
    public $health = 170;

    public function slash()
    {
        if($this->manna > 0)
        {
            $this->manna-=10;
        }
        return $this;
    }
    public function showStats()
    {
        echo "I am powerful!<br>";
        parent::showStats();
    }
}

$swordsman = new Swordsman();
$swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats();
?>