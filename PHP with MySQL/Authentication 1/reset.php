<?php
    require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
        <input type="hidden" name="action" value="reset">
        <input type="text" name="contact" placeholder="Enter contact number">
        <input type="submit" name="submit">
    </form>
    <a href="index.php">Go back here.</a>
</body>
</html>