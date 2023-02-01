<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "Fuzion321!");
    define("DB_DATABASE", "mv_wall");

    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if(!$connection)
    {
        die("Connection Error: ".$connection->errno);
    }
    session_start();
?>