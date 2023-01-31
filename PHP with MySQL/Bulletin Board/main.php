<?php
    require_once("connection.php");

    function fetch_all($query){
        global $connect;
        $results = mysqli_query($connect, $query);
        $rows = array();
        foreach($results as $result){
            $rows[] = $result;
        }
        return $rows;
    }
    $results = fetch_all("SELECT * FROM bulletin ORDER BY created_at DESC;");
    
    if(!empty($results)){
        $_SESSION["rows"] = $results;
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
    <h1>Bulletin Board View</h1>
    <div class="wrapper">
<?php
    if(isset($_SESSION["rows"]) && !empty($_SESSION["rows"])){
        foreach($_SESSION["rows"] as $row){
            $newDate = date_create($row["created_at"]);
            $date = date_format($newDate, "m/d/Y");
?>
        <h2><?= $date?> - <?= $row["title"] ?></h2>
        <p><?= $row["description"] ?></p>
<?php
        }
    }
?>
    </div>
</body>
</html>