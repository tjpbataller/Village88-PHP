<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the activity for Bug Ticket">
    <title>Bug Ticket</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family: Arial, sans-serif;
            font-size: 24px;
        }
        p{
            text-align: center;
        }
        form{
            display: block;
            width: 1000px;
            margin: 50px auto;
            padding: 20px 0 20px 20px;
        }
            form h1{
                font-size: 32px;
                text-align: center;
                margin-bottom: 40px;
            }
            form input,
            form label{
                display: block;
                padding: 5px 10px;
                margin-top: 10px;
                width: calc(50% - 120px);
            }
            form label#first_name_label,
            form label#last_name_label,
            form input#first_name,
            form input#last_name{
                display: inline-block;
                width: calc(50% - 120px);
                margin-right: 40px;
            }
            form input#issue_title{
                width: 60%;
            }
    </style>
</head>
<body>
<?php
    if(isset($_SESSION["responses"]) && !empty($_SESSION["responses"])){
        $responses = $_SESSION["responses"];
        foreach($responses as $response){
?>
    <p><?= $response?></p>
<?php
        }
        unset($_SESSION["responses"]);
    }
?>
    <form action="validate.php" method="post"><!-- 
        --><h1>Bug Ticket</h1><!--
        --><label for="date" id="date_label">Date Today:</label><!--
        --><input type="date" name="date" id="date" value="<?= (isset($_SESSION['date']))?$_SESSION['date']:"";?>"><!--
        --><label for="first_name" id="first_name_label">First Name:</label><!--
        --><label for="last_name" id="last_name_label">Last Name:</label><!--
        --><input type="text" name="first_name" id="first_name" value="<?= (isset($_SESSION['first_name']))?$_SESSION['first_name']:"";?>" placeholder="Ex: John"><!--
        --><input type="text" name="last_name" id="last_name" value="<?= (isset($_SESSION['last_name']))?$_SESSION['last_name']:"";?>" placeholder="Ex: Doe"><!--
        --><label for="email">E-mail:</label><!--
        --><input type="email" name="email" id="email" placeholder="Ex: john.doe@email.com"><!--
        --><label for="title">Title:</label><!--
        --><input type="text" name="issue_title" id="issue_title" placeholder="Ex: Scheduler - Task Box - Not Dragging"><!--
        --><label for="issue_details">Details:</label><!--
        --><textarea name="issue_details" id="issue_details" cols="70" rows="10"></textarea><!--
        --><input type="submit">
    </form>
</body>
</html>