<style>
    table,
    th,
    td{
        border: 1px solid;
        border-collapse: collapse;
        padding: 5px 10px;
    }
</style>
<?php
require_once("clients.php");
require_once("sites.php");

$sites = new Sites();
$sites->select(array("client_id", $sites->count));
$sites->group_by('client_id');
$sites->having($sites->count, ">", 5);
$sites->get();
echo "<br>";
$clients = new Clients();
$clients->select(["client_id","first_name","last_name"])->where(["last_name"=>"Owen"])->get();  //chaining methods
?>
