<?php
session_start();
$responses = array();
$date = new DateTime($_POST["date"]);
$now = new DateTime("now", new DateTimeZone("Asia/Manila"));
$_SESSION["date"] = $_SESSION["first_name"] = $_SESSION["last_name"] = $_SESSION["issue_title"] = $_SESSION["issue_details"] = "";

if(isset($_POST["date"]) && $_POST["date"] !== ""){
    
    if($date->format('Y-m-d') == $_POST["date"]){
        
        if($now->format('Y-m-d') !== $date->format('Y-m-d')){
            $responses[] = "Date Today must be current date.";
        }else{
            $_SESSION["date"] = $_POST["date"];
        }
    }else{
        $responses[] = "Date Today format is incorrect.";
    }
}else{
    $responses[] = "Date Today must not be blank.";
}
if(isset($_POST["first_name"]) && $_POST["first_name"] !== ""){
    
    if(!preg_match("/^([a-zA-Z' ]+)$/", $_POST["first_name"])){
        $responses[] = "First name must only contain letters.";
    }else{
        $_SESSION["first_name"] = $_POST["first_name"];
    }
}else{
    $responses[] = "First name must not be blank.";
}
if(isset($_POST["last_name"]) && $_POST["last_name"] !== ""){
    if(!preg_match("/^([a-zA-Z' ]+)$/", $_POST["last_name"])){
        $responses[] = "Last name must only contain letters.";
    }else{
        $_SESSION["last_name"] = $_POST["last_name"];
    }
}else{
    $responses[] = "Last name must not be blank.";
}
if(isset($_POST["email"]) && $_POST["email"] !== ""){
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $responses[] = "E-mail format is not valid.";
    }else{
        $_SESSION["email"] = $_POST["email"];
    }
}else{
    $responses[] = "E-mail must not be blank.";
}
if(isset($_POST["issue_title"]) && $_POST["issue_title"] !== ""){
    if(strlen($_POST["issue_title"]) > 50){
        $responses[] = "Title must not exceed 50 characters.";
    }else{
        $_SESSION["issue_title"] = $_POST["issue_title"];
    }
}else{
    $responses[] = "Title must not be blank.";
}
if(isset($_POST["issue_details"]) && $_POST["issue_details"] !== ""){
    if(strlen($_POST["issue_details"]) > 250){
        $responses[] = "Detail must not exceed 250 characters.";
    }else{
        $_SESSION["issue_details"] = $_POST["issue_details"];
    }
}else{
    $responses[] = "Detail must not be blank.";
}
if(!empty($responses)){
    $_SESSION["responses"] = $responses;
}else{
    $_SESSION["responses"][] = "Ticket has been submitted.";
    unset($_SESSION["email"]);
    unset($_SESSION["first_name"]);
    unset($_SESSION["last_name"]);
    unset($_SESSION["date"]);
}


header("Location: index.php");
?>