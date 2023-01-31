<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the activity for Bulletin Board">
    <title>Bulletin Board</title>
</head>
<body>
    <h1>Bulletin Board Entry</h1>
    <form action="process.php" method="post">
        <label>Subject: 
            <input type="text" name="title">
        </label>
        <label>Details: 
            <input type="text" name="description">
        </label>
        <input type="submit" name="add" value="Add">
        <a href="main.php"><input type="button" value="Skip"></a>
    </form>
</body>
</html>