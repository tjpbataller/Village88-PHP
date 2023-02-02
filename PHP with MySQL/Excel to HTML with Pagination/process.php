<?php
    require_once("connection.php");
    require_once("method.php");

    if(isset($_FILES["csv"]))
    {
        if(file_check_duplicate($_FILES) == true)
        {
            $file = file_upload($_FILES);
            file_insert($file["file_base_name"], $file["file_location"]);
            header("Location: index.php");
            die();
        }
        else
        {
            echo "Duplicate file";
            header("Location: index.php");
            die();
        }
    }
    else
    {
        $_SESSION["csv_id"] = $_GET["id"];
        header("location: record.php?page=1");
    }
?>  