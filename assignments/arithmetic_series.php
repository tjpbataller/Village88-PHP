<?php
$numbers = [2,5,8,11,14];
$sum = 0;
for($index=0; $index < count($numbers); $index++){
    $sum += $numbers[$index];
    echo $sum."<br>";
}