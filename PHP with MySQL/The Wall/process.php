<?php
require_once("connection.php");
require_once("method.php");

if($_POST["action"] == "login")
{
    
    if(!empty($user = login_user($_POST)))
    {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["last_name"] = $user["last_name"];
        $_SESSION["email"] = $user["email"];
        header("location: index.php");
        die();
    }
    echo "No user found";
}
else if($_POST["action"] == "message")
{
    add_messages($_POST["message"]);
    header("location: index.php");
    die();
}
else if($_POST["action"] == "comment")
{
    add_comments($_POST["message_id"], $_POST["comment"]);
    header("location: index.php");
    die();
}else
{
    session_destroy();
    header("location: index.php");
}
?>