<?php
    require_once("connection.php");
    function file_check_duplicate($file)
    {
        global $connection;
        $file_name = $file["csv"]["name"];
        $file_base_name = basename($file_name, ".csv");

        $query = "SELECT * FROM files WHERE files.file_name = '{$file_base_name}'";
        $results = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($results);
        if(empty($result))
        {
            return true;
        }
        return false;
    }

    function file_upload($file)
    {
        if(!empty($file))
        {
            $file_name = $file["csv"]["name"];
            $file_base_name = basename($file_name, ".csv");
            $file_tmp = $file["csv"]["tmp_name"];
            $file_location = "files/".$file_name;
            $result = array();
            $result["file_base_name"] = $file_base_name;
            $result["file_tmp"] = $file_tmp;
            $result["file_location"] = $file_location;

            move_uploaded_file($file_tmp, $file_location);

            return $result;
        }
    }

    function file_insert($file_base_name, $file_location)
    {
        global $connection;

        $query = "INSERT INTO files(file_name, location, created_at) VALUES('{$file_base_name}','{$file_location}', NOW());";
        $result = mysqli_query($connection, $query);

        return $result;
    }
    
    function file_open()
    {
        ini_set("auto_detect_line_endings", TRUE);   
        
        $index = 50;


    }
    
    function file_fetch_all()
    {
        global $connection;

        $query = "SELECT * FROM files;";
        $results = mysqli_query($connection, $query);
        
        return $results;
    }

    function file_fetch($id)
    {
        global $connection;

        $query = "SELECT * FROM files WHERE id = '$id'";
        $results = mysqli_query($connection, $query);
        $result = mysqli_fetch_assoc($results);

        return $result;
    }

    function file_records($page_id)
    {
        
    }
?>