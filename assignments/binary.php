<?php
$binary = array(1,1,0,1,1,0,1);

function get_count($arr){
    $newArr=array();
    $newArr["zeroes"] = 0;
    $newArr["ones"] = 0;

    foreach($arr as $number){
        if($number == 0){
            $newArr["zeroes"]+=1;
        }else{
            $newArr["ones"]+=1;
        }
    }
    return $newArr;
}

$output = get_count($binary);
var_dump($output);