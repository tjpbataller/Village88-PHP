<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="This is the activity for PHP Form Data">
        <title>PHP Form Data</title>
        <style>
            *{
                margin: 0;
                padding: 0;
                font-family: Arial, Sans-serif;
                font-size: 20px;
            }
            section{
                border: solid 4px black;
                max-width: 450px;
                margin: 50px auto;
                padding: 20px 0px 20px 20px;
                border-radius: 20px;
            }
                section h1{
                    text-align: center;
                    margin-bottom: 15px;
                    font-size: 28px;
                }
                section p{
                    margin-bottom: 10px;
                    display: inline-block;
                    width: 200px;
                    padding-left: 20px;
                }
                section p.reason{
                    display: block;
                }
                section a{
                    display: block;
                    max-width: 100px;
                    text-align: center;
                    text-decoration: none;
                    text-transform: uppercase;
                    padding: 5px;
                    color: black;
                    border: solid 4px black;
                    margin-top: 30px;
                }
        </style>
    </head>
    <body>
        <section>
            <h1>Submitted Entry</h1><!--
            --><p>Your Name (optional):</p><!--
            --><p><?= $_POST["fullname"] ?></p><!--
            --><p>Course Title:</p><!--
            --><p><?= $_POST["course"]?></p><!--
            --><p>Given Score(1-10):</p><!--
            --><p><?= $_POST["score"]?></p><!--
            --><p class="reason">Reason:</p><!--
            --><p class="reason"><?= $_POST["reason"]?></p><!--
            --><a href="index.php">return</a>
        </section>
    </body>
</html>