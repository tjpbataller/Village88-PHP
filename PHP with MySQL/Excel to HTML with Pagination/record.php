<?php
    require_once("connection.php");
    require_once("method.php");
    $page = $_GET["page"];
    $file = file_fetch($_SESSION["csv_id"]);
    ini_set("auto_detect_line_endings", TRUE);
    $record = file("files/{$file['file_name']}.csv");
    $rows = 50;
    $base = ($rows*($page-1));
    $start = $base+1;
    $end = $base+$rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td,
        tr,
        th{
            outline: 1px solid black;
        }
        .wrapper div{
            width: fit-content;
            margin: auto;
        }
            .wrapper div a{
                margin: 10px 20px;
                font-size: 1.4rem;
                text-decoration: none;
            }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1><?= $file["file_name"] ?></h1>
        <table>
            <thead>
                <tr>
<?php
                foreach(str_getcsv($record[0]) as $col){
?>
                <th><?= $col ?></th>
<?php
                }
?>
                </tr>
            </thead>
            <tbody>
<?php
            for($index = $start; $index< $end; $index++){
?>
                <tr>
<?php
                foreach(($row = str_getcsv($record[$index])) as $col){
?>
                    <td><?= $col ?></td>
<?php
                }
?>
                </tr>
<?php
            }
            
            // fclose($record);
?>
            </tbody>
        </table>
        <div>
<?php
            for($index = 1; $index <= (count($record)/50); $index++)
            {
?>
            <a href="<?= "record.php?page=".$index ?>"><?= $index ?></a>
<?php
            }
?>
        </div>
    </div>
</body>
</html>