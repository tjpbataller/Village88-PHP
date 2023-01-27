<?php
session_start();
if(isset($_SESSION)){
    $_SESSION['type'] = "form";
    $_SESSION['coupon'] = rand(1132451,9253721);
    if(!isset($_SESSION['count'])){
        $_SESSION['count'] = 10;
    }
    if(isset($_POST['submit'])){
        $_SESSION['type'] = "text";
    }else if(isset($_POST['again']) || isset($_POST['reset'])){
        $_SESSION['type'] = "form";
        if(isset($_POST['again']) && $_SESSION['count'] != 0){
            $_SESSION['count'] = $_SESSION['count'] - 1;
        }else if(isset($_POST['reset'])){
            $_SESSION['count'] = 10;
        }
    }
}else{
    echo "session not set";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is the activity for PHP Form Data - Free Coupon">
    <title>Free Coupon</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .hidden{
            display: none;
        }
        h1{
            font-size: 36px;
        }
        p{
            width: 360px;
            margin: 0 auto;
        }
        form{
            width: fit-content;
            padding: 20px 0;
            margin: 40px auto;
        }
        form#message{
            background-color: yellow;
            border: dashed 5px black;
            border-radius: 20px;
        }
            form h2{
                font-size: 46px;
            }
            form label{
                display: inline-block;
                width: 100%;
            }
            form input{
                display: block;
                margin: 5px auto;
                padding: 5px 10px;
                background-color: green;
                border: solid 5px black;
                color: white;
                cursor: pointer;
            }
            form input#name{
                background: white;
                color: black;
                margin-bottom: 20px;
            }
            form input.btn{
                display: inline-block;
                width: fit-content;
                margin: 5px 10px;
            }
            form input.btn.hidden{
                display: none;
            }
            form input#reset{
                background-color: darkred;
            }
    </style>
</head>
<body>
    <h1>Welcome Customer!</h1>
    <p>We're giving away free coupons as token of appreciation</p>
    <p <?= $_SESSION['type'] == "form"?"":"class='hidden'";?>>for first <?= isset($_SESSION["count"])?$_SESSION["count"]:"10"; ?> customers(s)</p>
    <form <?= $_SESSION['type'] == "form"?"":"id='message'";?> action="./" method="post" id="form">
        <p for="name">
            <?=
                ($_SESSION['type'] == "form")?"Kindly type your name":($_SESSION['type'] == "text" && $_SESSION['count'] != 0?"50% Discount":"Sorry!");
            ?>
        </p>
        <input <?= $_SESSION['type'] == "form"?"":"class='hidden'";?> type="text" name="name" id="name">
        <input <?= $_SESSION['type'] == "form"?"":"class='hidden'";?> type="submit" name="submit">
        <h2 <?= $_SESSION['type'] == "form"?"class='hidden'":""; ?>><?= $_SESSION['count'] != 0?$_SESSION['coupon']:"Unavailable"; ?></h2>
        <input type="submit" name="reset" class="btn <?= $_SESSION['type'] == "form"?"hidden":"";?>" id="reset" value="Reset count">
        <input type="submit" name="again" class="btn <?= $_SESSION['type'] == "form"?"hidden":""; ?>" value="Claim again">
    </form>
</body>
</html>