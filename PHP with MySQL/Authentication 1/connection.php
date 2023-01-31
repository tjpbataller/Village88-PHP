<?php
    session_start();

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "Fuzion321!");
    define("DB_DATABASE", "authentication");

    if(!$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE))
    {
        die("Error: ".$connection->errno);
    }

?>