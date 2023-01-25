<html lang="en">
    <body>
        <style>
            th,
            td{
                outline: 1px black solid;
            }
            .colored{
                background-color: lightgray;
            }
        </style>
        <?php
            $users = array( 
                array("cardholder_name"=> "Michael Choi", "cvc" => 123, "acc_num" => "1234 5678 9876 5432"),
                array("cardholder_name"=> "John Supsupin","cvc" => 789, "acc_num" => "0001 1200 1500 1510"),
                array("cardholder_name"=> "KB Tonel", "cvc" => 567, "acc_num" => "4568 456 123 5214"),
                array("cardholder_name"=> "Mark Guillen", "cvc" => 345, "acc_num" => "123 123 123 123"),
                array("cardholder_name"=> "Michael Choi", "cvc" => 123, "acc_num" => "1234 5678 9876 5432"),
                array("cardholder_name"=> "John Supsupin","cvc" => 789, "acc_num" => "0001 1200 1500 1510"),
                array("cardholder_name"=> "KB Tonel", "cvc" => 567, "acc_num" => "4568 456 123 5214"),
                array("cardholder_name"=> "Michael Choi", "cvc" => 123, "acc_num" => "1234 5678 9876 5432"),
                array("cardholder_name"=> "John Supsupin","cvc" => 789, "acc_num" => "0001 1200 1500 1510"),
                array("cardholder_name"=> "KB Tonel", "cvc" => 567, "acc_num" => "4568 456 123 5214"),
                array("cardholder_name"=> "Mark Guillen", "cvc" => 345, "acc_num" => "123 123 123 123")
            );
        ?>
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Name in uppercase</th>
                <th>Account Num</th>
                <th>CVC Num</th>
                <th>Full account</th>
                <th>Length of full account</th>
                <th>Is Valid</th>
            </thead>
            <tbody>
                <?php foreach($users as $key => $row){ ?>
                    <tr class="<?= ($key+1)%3 == 0?"colored":"";?>">
                        <td><?=$key+1?></td>
                        <td><?=$row["cardholder_name"]?></td>
                        <td><?=strtoupper($row["cardholder_name"])?></td>
                        <td><?=$row["acc_num"]?></td>
                        <td><?=$row["cvc"]?></td>
                        <td><?=$row["acc_num"]." ".$row["cvc"]?></td>
                        <td><?=strlen($row["acc_num"])?></td>
                        <td><?= strlen($row["acc_num"])<19?"No":"Yes";?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>