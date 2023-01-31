<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Fuzion321!');
define('DB_DATABASE', 'people');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
if($connection->connect_errno){
    die("Failed to connect to MySQL: (".$connection->connect_errno.")".$connection->connect_error);
}


function fetch($query){
    global $connection;
    $result = mysqli_fetch_assoc($connection, $query);

    return $result;
}

function fetch_all($query){
    global $connection;
    $results = mysqli_query($connection, $query);
    $rows = array();

    foreach($rows as $result){
        $rows[] = $result;
    }

    return $rows;
}

function insert_data($query){
    global $connection;
    $results = mysqli_query($connection, $query);
    
    if(!$results){
        echo "error description".$connection->error;
    }
    if(preg_match("/insert/i", $query)){
        return mysqli_insert_id($connection);
    }

    return $result;
}

var_dump(insert_data($query));