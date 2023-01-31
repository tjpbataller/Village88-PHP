<?php
    require_once("connection.php");
    if(isset($_SESSION) && isset($_SESSION["id"])){
        header("location: success.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_SESSION["errors"]))
    {
        foreach($_SESSION["errors"] as $error)
        {
?>
    <p><?= $error ?></p>
<?php
        }
        unset($_SESSION["errors"]);
    }
?>
    <form action="process.php" method="post">   
        <input type="hidden" name="action" value="register">
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <input type="text" name="contact" placeholder="Contact Numbber">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="repeat_password" placeholder="Repeat Password">
        <input type="submit" name="submit">
    </form>
    <form action="process.php" method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="contact" placeholder="Contact Number">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="submit">
    </form>
    <a href="reset.php">reset password here!</a>
</body>
</html>