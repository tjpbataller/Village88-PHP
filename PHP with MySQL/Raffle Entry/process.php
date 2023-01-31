<?php
require_once("connection.php");

$contact = $_POST["contact"];
$errors = array();
// $newDate = new DateTime("now", new DateTimeZone("Asia/Manila"));
// $currentDate = $newDate->format("Y-m-d H:iA");

if(strlen($contact) == 11 && preg_match_all("/[0][9]\d{9}/",$contact)){
    $query = "INSERT INTO raffle (contact_number, created_at) VALUES ('$contact', NOW());";
    global $connection;
    $result = mysqli_query($connection, $query);
    
    if($connection->error){
        $errors[] = "Duplicate entry! Please try again.";
        $_SESSION["errors"] = $errors;
        header("Location: index.php");
        die();
    }
    $_SESSION["inserted"] = mysqli_insert_id($connection);
    header("Location: success.php");
}else{
    $errors[] = "Invalid Phone number format";
    $_SESSION["errors"] = $errors;
    header("Location: index.php");
}
