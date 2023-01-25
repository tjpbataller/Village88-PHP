<?php

$digits = array(8,11,4);

function exponential($arr, $expo){
    foreach($arr as $key => $value){
        $arr[$key] = pow($value,$expo);
    }
    return $arr;
}
$result=exponential($digits, 4);
var_dump($result);