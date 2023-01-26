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
                margin:0;
                padding:0;
                font-family: Arial, sans-serif;
                font-size: 18px;
            }
            form,
            h2,
            label,
            select,
            textarea,
            input{
                display: block;
                margin-bottom: 10px;
            }
            form{
                max-width: 300px;
                margin: 50px auto;
                outline: 4px solid black;
                padding: 20px 50px;
                border-radius: 10px;
            }
                form h2{
                    text-align: center;
                    font-size: 24px;
                    margin-bottom: 25px;
                }
                form input#submit{
                    padding: 10px 20px;
                    margin-left: 190px;
                }
        </style>
    </head>
    <body>
        <form action="result.php" method="post">
            <h2>Feedback Form</h2>
            <label for="fullname">Your Name (optional):</label>
            <input type="text" name="fullname" id="fullname">
            <label for="course">Course Title:</label>
            <select name="course" id="course">
                <option value="php">PHP Track</option>
                <option value="css">CSS</option>
                <option value="rwd">Responsive Web Design</option>
            </select>
            <label for="score">Given Score (1-10):</label>
            <select name="score" id="score">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label for="reason">Reason:</label>
            <textarea name="reason" id="reason" cols="30" rows="10"></textarea>
            <input type="submit" value="Submit" id="submit">
        </form>
    </body>
</html>