<?php
$cards = array(
    "King"=>13,
    "Queen"=>12,
    "Jack"=>11,
    "Ace"=>1
);

function pair($arr){
    echo "<p>List of keys in the array:</p><ul>";
    foreach($arr as $card){
        echo "<li>$card</li>";
    }
    echo "</ul>";
    echo "<br>";
    foreach($arr as $key => $value){
        echo "<p>The value of $key in Pyramid Solitaire is $value</p>";
    }
}

pair($cards);