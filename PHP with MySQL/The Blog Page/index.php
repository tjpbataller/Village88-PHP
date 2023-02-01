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
    <title>Blog</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        header{
            width: 1200px;
            /* background-color: lightgray; */
            color: red;
            font-size: 0;
            padding: 10px 50px;
            margin: auto;
        }
            header p,
            header a,
            header form{
                display: inline-block;
                font-size: 1.6rem;
            }
            header p#header{
                width: 900px;
            }
            header a{
                text-decoration: none;
                background-color: blue;
                color: white;
                border-radius: 10px;
                padding: 5px 10px;
            }
                header form input[type="submit"]{
                    background-color: blue;
                    color: white;
                    font-size: 1.2rem;
                    border-radius: 5px;
                    border: none;
                    padding: 5px 10px;
                }
            .wrapper{
                width: 1200px;
                margin: 50px auto;
            }
                .wrapper h1,
                .wrapper p,
                .wrapper form{
                    margin-bottom: 20px;
                }
                    .wrapper div form,
                    .wrapper div div{
                        margin-left: 100px;
                        width: 500px;
                    }
    </style>
</head>
<body>
    <header>
        <p id="header">Blog</p>
<?php
        if(!isset($_SESSION["user_id"])){
?>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="login">
            <input type="text" name="user_id">
            <input type="submit" name="submit" value="login">
        </form>
<?php
        }else{
?>
        <p>Welcome <?= $_SESSION["first_name"]?>!</p>
        <a href="process.php">log out</a>
<?php
        }
?>
    </header>
    <div class="wrapper">
        <h1>Title</h1>
        <p>Some shit</p>
<?php
        if(isset($_SESSION["user_id"])){
?>
        <form action="process.php" method="post">
            <h2>Leave a Review</h2>
            <input type="hidden" name="action" value="review">
            <textarea name="content" cols="50" rows="5"></textarea>
            <input type="submit" name="submit" value="review">
        </form>
<?php
        }
        $results = view_review();
        foreach($results as $result)
        {
            $date = date_create($result["created_at"]);
            $date_format = date_format($date, "F n Y H:iA");
            $review_id = $result["id"];
?>
        <div>
            <h3><?= $result["first_name"]?> <?= $result["last_name"]?> (<?= $date_format; ?>)</h3>
            <p><?= $result["content"]?></p>
<?php
            $results = view_reply($review_id);
            foreach($results as $result){
                $date = date_create($result["created_at"]);
                $date_format = date_format($date, "F n Y H:iA");
?>
            <div class="reply">
                <h3><?= $result["first_name"];?> <?=$result["last_name"];?> (<?=  $date_format; ?>)</h3>
                <p><?= $result["content"]; ?></p>
            </div>
<?php
            }
            if(isset($_SESSION["user_id"])){
?>
            <form action="process.php" method="post">
                <input type="hidden" name="review_id" value="<?= $review_id ?>">
                <input type="hidden" name="action" value="reply">
                <textarea name="content" cols="50" rows="5"></textarea>
                <input type="submit" value="reply">
            </form>
<?php
            }
?>
        </div>
<?php
        }
?>
    </div>
</body>
</html>