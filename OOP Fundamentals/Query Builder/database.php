<?php
class Database
{
    protected $connection;

    public function __construct()
    {
        defined("DB_HOST") or define("DB_HOST", "localhost");
        defined("DB_USER") or define("DB_USER","root");
        defined("DB_PASS") or define("DB_PASS","Fuzion321!");
    }
    protected function connect($db_name)
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, $db_name);
    }
}
?>