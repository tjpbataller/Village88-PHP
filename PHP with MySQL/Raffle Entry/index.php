<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the activity for Raffle Entry">
    <title>Raffle Entry</title>
    <style>
        p.success{
            background-color: lightgreen;
            width: fit-content;
            padding: 10px 20px;
            border: solid 2px black;
        }
        form.success{
            display: none;
        }
    </style>
</head>
<body>
<?php
    if(isset($_SESSION["errors"])){
        foreach($_SESSION["errors"] as $error){
?>
    <p><?= $error ?></p>
<?php
        }
        unset($_SESSION["errors"]);
    }
?>
    <form action="process.php" method="post">
        <input type="text" name="contact">
        <input type="submit" name="submit" value="Add Contact">
    </form>
</body>
</html>