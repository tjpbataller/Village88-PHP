<?php

class HTML_Generator
{
    public function render_input($array)
    {
        foreach($array as $key=>$value)
        {
            
            echo "<label>".ucfirst($key)."<input type='text' value='{$value}' /></label>";
        }

        return $this;
    }

    public function render_list($array, $type)
    {
        if($type == "unordered")
        {
            $start = "<ul>";
            $end = "</ul>";
        }
        else
        {
            $start = "<ol>";
            $end = "</ol>";
        }
        foreach($array as $key=>$value)
        {
            echo $start."<li>".$value."</li>".$end;
        }

        return $this;
    }
}

$obj1 = new HTML_Generator();
$obj1->render_input(["name" => "Bag", "price" => "250", "stocks" => "10"])->render_list(["Apple", "Banana", "Cherry"], "unordered");

?>