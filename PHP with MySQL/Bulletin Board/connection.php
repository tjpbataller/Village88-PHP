<?php
session_start();

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Fuzion321!");
define("DB_DATABASE", "bulletin");

$connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
?>