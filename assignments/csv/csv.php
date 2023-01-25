<style>
    *{
        font-family: sans-serif, arial;
    }
    .colored{
        background-color: lightgray;
    }
    table{
        text-align: center;
    }
    th{
        text-transform: uppercase;
        padding: 5px;
    }
    td,
    th{
        outline: 1px solid black;
    }
</style>
<?php
    $file = fopen("us-500.csv", "r");
    ini_set('auto_detect_line_endings', TRUE);
    $row = fgetcsv($file);
    $index = 1;
?>
<table>
<thead>
    <?php
        foreach($row as $data){
    ?>
        <th><?= $data?></th>
    <?php
        }
    ?>
</thead>
<tbody>
    <?php
        while(($row = fgetcsv($file)) !== false){
    ?>
    <tr <?= $index%10==0?"class='colored'":""; ?>>
        <?php
            foreach($row as $col) {
        ?>
        <td><?=$col?></td>
        <?php
            }
            $index++;
        ?>
    </tr>
    <?php
        }
        fclose($file);
    ?>
</tbody>
</table>