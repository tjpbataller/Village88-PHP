<?php

$numbers = [13,143,88,65,120];
$sum = 0;

for($index=0;$index<count($numbers);$index++){
    $sum += $numbers[$index];
}

$mean = $sum/count($numbers);

echo "MEAN: $mean";