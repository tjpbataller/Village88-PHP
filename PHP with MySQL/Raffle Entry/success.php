<?php
require_once("connection.php");

$query = "SELECT * FROM raffle";

$_SESSION["success"] = "success";
function select_all($query){
    global $connection;
    $results = mysqli_query($connection, $query);
    if($connection->error){
        $errors = array();
        $errors[] = "ERROR: ".$connection->error;
        $_SESSION["errors"] = $errors;
        header("Location: index.php");
        die();
    }
    return $results;
}
$results = select_all($query);

function select_one($id){
    global $connection;
    $results = mysqli_query($connection, "SELECT * FROM raffle WHERE id='$id';");
    $result = mysqli_fetch_assoc($results);

    return $result["contact_number"];
}
?>
<p>Success! Contact number <?= select_one($_SESSION["inserted"]) ?> is now added.</p>
<table>
    <thead>
        <th>Contact Number</th>
        <th>Date Inserted</th>
    </thead>
<?php
    foreach($results as $result){
?>
    <tbody>
        <tr>
            <td><?= $result["contact_number"]?></td>
<?php
    $date = date_create($result["created_at"]);
?>
            <td><?= date_format($date, "Y-d-m h:iA") ?></td>
        </tr>
    </tbody>
<?php
    }
?>
</table>

<?php
    // $date = mysqli_fetch_assoc($select);
    // $result = date_create($date["created_at"]);
    // echo date_format($result, "Y-d-m h:iA");
?>