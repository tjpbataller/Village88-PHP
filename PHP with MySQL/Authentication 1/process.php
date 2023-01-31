<?php
    require_once("connection.php");

    $_SESSION["errors"] = array();

    function check_action($post)
    {
        validate_forms($post);
    }

    function validate_forms($post)
    {
        if($post["action"] == "register")
        {
            if(isset($post["first_name"]) && $post["first_name"] !== "")
            {
                for($index = 0; $index < strlen($post["first_name"]); $index++){
                    if(is_numeric($post["first_name"][$index])){
                        $_SESSION["errors"][] = "First name must not contain numbers";
                        break;
                    }
                }
                $_SESSION["first_name"] = $post["first_name"];
            }
            else
            {
                $_SESSION["errors"][] = "First name must not be blank";
            }
            if(isset($post["last_name"]) && $post["last_name"] !== "")
            {
                for($index = 0; $index < strlen($post["last_name"]); $index++){
                    if(is_numeric($post["last_name"][$index])){
                        $_SESSION["errors"][] = "Last name must not contain numbers";
                        break;
                    }
                }
                $_SESSION["last_name"] = $post["last_name"];
            }
            else
            {
                $_SESSION["errors"][] = "Last name must not be empty.";
            }
            if(isset($post["contact"]) && $post["contact"] !== "")
            {
                if(strlen($post["contact"]) > 11)
                {
                    $_SESSION["errors"][] = "Contact number is too long";
                }
                else
                {
                    for($index = 0; $index < strlen($post["contact"]); $index++){
                        if($post["contact"][0] != "0" || $post["contact"][1] != "9" || !is_numeric($post["contact"][$index]))
                        {
                            $_SESSION["errors"][] = "Contact number format is not valid.";
                            break;
                        }
                    }
                }
                $_SESSION["contact"] = $post["contact"];
            }
            else
            {
                $_SESSION["errors"][] = "Contact number must not be empty.";
            }
            if(isset($post["password"]) && !empty($post["password"]))
            {
                if(strlen($post["password"]) < 8)
                {
                    $_SESSION["errors"][] = "Password must be atleast 8 characters long";
                }
                else
                {
                    $encrypted_password = md5($post["password"]);
                    $_SESSION["password"] = $encrypted_password;
                }
            }
            else
            {
                $_SESSION["errors"][] = "Password must not be empty.";
            }
            if($post["action"] == "register" && isset($post["repeat_password"]) && !empty($post["repeat_password"])){
                if($post["repeat_password"] !== $post["password"]){
                    $_SESSION["errors"][] = "Passwords must match.";
                }
            }
            else
            {
                $_SESSION["errors"][] = "Repeat Password must not be empty.";
            }
            if(empty($_SESSION["errors"]))
            {
                add_user($post);
            }
        }
        if($post["action"] == "login")
        {
            if(isset($post["contact"]) && $post["contact"] == "")
            {
                $_SESSION["errors"][] = "Contact Number must not be blank.";
            }
            else if(isset($post["password"]) && $post["password"] == "")
            {
                $_SESSION["errors"][] = "Password must not be blank.";
            }
            else
            {
                login_user($post);
            }
        }
        if($post["action"] == "reset")
        {
            if(isset($post["contact"]) && $post["contact"] !== "")
            {
                if(strlen($post["contact"]) > 11)
                {
                    $_SESSION["errors"][] = "Contact number is too long";
                    header("location: reset.php");
                    die();
                }
                else
                {
                    if($post["contact"][0] != "0" || $post["contact"][1] != "9")
                    {
                        $_SESSION["errors"][] = "Contact number format is not valid.";
                        header("location: reset.php");
                        die();
                    }
                    else
                    {
                        $numeric = 0;
                        for($index = 0; $index < strlen($post["contact"]); $index++){
                            if(!is_numeric($post["contact"][$index]))
                            {
                                $numeric+=1;
                                break;
                            }
                        }
                        if($numeric > 0)
                        {   
                            $_SESSION["errors"][] = "Contact number format is not valid.";
                            header("location: reset.php");
                            die();
                        }
                        else
                        {
                            global $connection;
                            $password = md5("village88");
                            $query = "SELECT users.id FROM users WHERE users.contact = '{$post['contact']}';";
                            $results = mysqli_query($connection, $query);
                            if(mysqli_num_rows($results) > 0){
                                $query = "UPDATE users SET password = '$password' WHERE contact = '{$post["contact"]}'";
                                $result = mysqli_query($connection, $query);
                                $_SESSION["errors"][] = "Password has been reset";
                                header("location: reset.php");
                                die();
                            }else{
                                $_SESSION["errors"][] = "Contact number not found";
                                header("location: reset.php");
                                die();
                            }
                        }
                    }
                }
                $_SESSION["contact"] = $post["contact"];
            }
            else
            {
                $_SESSION["errors"][] = "Contact number must not be empty.";
                header("location: reset.php");
                die();
            }
        }
    }

    function login_user($post)
    {
        global $connection;
        $password = md5($post["password"]);
        $query = "SELECT * FROM users WHERE users.password = '{$password}' AND users.contact = '{$post['contact']}';";
        $result = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($result);
        $_SESSION["id"] = $user['id'];
        if(empty($user))
        {
            $_SESSION["errors"][] = "Account does not exist.";
        }
    }

    function add_user($post)
    {
        global $connection;
        $query = "INSERT INTO users (first_name, last_name, contact, password, created_at) VALUES ('{$post["first_name"]}','{$post["last_name"]}','{$post["contact"]}','{$_SESSION["password"]}',NOW())";
        $results = mysqli_query($connection, $query);
        if($results)
        {
            // var_dump($results);
        }
    }

    if(isset($_POST) && ($_POST["action"] == "register" || $_POST["action"] == "login" || $_POST["action"] == "reset"))
    {
        check_action($_POST);
    }
    else
    {
        session_destroy();
        header("location: index.php");
        die();
    }

    if(empty($_SESSION["errors"]))
    {
        header("location: success.php");
        die();
    }

    header("location: index.php");
?>