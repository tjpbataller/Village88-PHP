<html>
    <head>
        <style>
            *{
                font-size: 42px;
                font-family: sans-serif, arial;
            }
            table,h1{
                margin: 20px auto;
                text-align: center;
            }

            td.colored_1{
                color: blue;
            }
            td.colored_2{
                color: red;
            }
            th, td{
                outline: 2px solid black;
                padding: 5px 10px;
                text-align: center;
            }
        </style>    
    </head>
    <body>
        <h1>BINGO</h1>
        <table>
            <tbody>
                <?php
                    $class="1";
                    for($row=2; $row<=6; $row++){
                ?>
                    <tr>
                        <?php
                            for($col=1; $col<=5; $col++){
                        ?>
                            <td class="colored_<?= ($row+$col)%2+1 ?>"><?= $col * $row?></td>
                        <?php
                            }
                        ?>
                    </tr> 
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>