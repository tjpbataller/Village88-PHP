<?php
required_once("connection.php");

$errors = array();
$title = $_SESSION["title"] = $_POST["title"];
$desc = $_SESSION["desc"] = $_POST["description"];

function validate_form($title, $desc, $errors){
    if(empty($title) && empty($desc)){
        $errors[] = "Both fields must not be blank";
        return $errors;
    }
    if(empty($title)){
        $errors[] = "Title must not be blank";
    }
    if(empty($desc)){
        $errors[] = "Description must not be blank";
    }
    return $errors;
}

function insert_data($title, $desc){
    global $connect;
    $query = "INSERT INTO bulletin(title, description) VALUES('$title','$desc');";
    $results = mysqli_query($connect, $query);

    return $results;
}

$_SESSION["results"] = insert_data($title, $desc);
header("");
?>