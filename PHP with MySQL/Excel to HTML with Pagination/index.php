<?php
    require_once("connection.php");
    require_once("method.php");
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
    <div class="wrapper">
        <form action="process.php" method="post" enctype="multipart/form-data">
            <input type="file" name="csv">
            <input type="submit" name="submit">
        </form>
        <h1>Uploaded Files:</h1>
        <ul>
<?php
        $files = file_fetch_all();
        foreach($files as $file)
        {
?>
            <li><a href="process.php?id=<?= $file["id"]?>"><?= $file["file_name"]?></a></li>
<?php
        }
?>
        </ul>
    </div>
</body>
</html>