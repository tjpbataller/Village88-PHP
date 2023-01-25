<?php

$x = array('Spaghetti','Pizza','Iced tea');

function print_orders($orders){
    echo "<ul>";
    foreach($orders as $order){
        echo "<li>$order</li>";
    }
    echo "</ul>";
}

print_orders($x);