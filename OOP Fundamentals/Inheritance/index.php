<?php
class Smartphone {
    public $apps = array("Playstore");
    public $model;
    public $sim1;

    public function __construct() 
    {
        echo "Welcome!";
        $this->model = "Realme 8 5g";
    }
    public function install($app_name) 
    {
        array_push($this->apps, $app_name);
        echo "Successfully installed $app_name.";
        $this->list_apps();
    }
    public function list_apps() 
    {
        echo "<br>All apps:";
        foreach($this->apps as $app) 
        {
            echo "$app ";
        }
    }
}

class Realme extends SmartPhone
{
    public function loudNoise()
    {
        echo "loud noise comming.";
    }
    public function install($app_name)
    {
        echo "installing something...";
        parent::list_apps();
    }
}

$realme = new Realme();
$realme->install("just me");
?>