<?php
require_once("database.php");

class QueryBuilder extends Database
{   
    private $select = "";
    protected $from = "";
    private $where = "";
    private $groupby = "";
    private $having = "";
    public $count = "COUNT(*)";

    public function select($array)
    {
        $columns = "";
        if(gettype($array) == "array")
        {
            foreach($array as $key=>$data)
            {
                if($key == count($array) - 1)
                {
                    $data = $data;
                }
                else
                {
                    $data = $data.", ";
                }
                $columns .= $data;
                
            }
        }
        else
        {
            $columns = $array;
        }

        $this->select = "SELECT $columns FROM $this->from";

        return $this;
    }

    public function where($array)
    {
        $conditions = "";
        $counter = 0;
        foreach($array as $key=>$data)
        {
            if($counter == (count($array) - 1))
            {
                $end = " ";
            }
            else if(count($array) > 1)
            {
                $end = " AND ";
            }
            $conditions .= "$key = '$data'".$end;
            $counter++;
        };
        if($this->select == "")
        {
            $this->where = "SELECT * FROM $this->from WHERE $conditions";
        }
        else
        {
            $this->where = "WHERE $conditions";
        }
        return $this;
    }
    public function group_by($group)
    {
        $this->groupby = " GROUP BY ".$group;

        return $this;
    }
    public function having($data, $condition, $value)
    {
        $this->having = " HAVING ".$data." $condition ".$value;;
        return $this;
    }
    public function get()
    {
        $mysql = $this->connect("lead_gen_business");
        $query = $this->select.$this->where.$this->groupby.$this->having;
        $results = $this->connection->query($query);
        $result = $results->fetch_assoc();
        echo "<table><thead><tr>";
        foreach($result as $key=>$value)
        {
            echo "<th>$key</th>";
        }
        echo "</tr></thead><tbody>";
        foreach($results as $key=>$value)
        {   
            echo "<tr>";
            foreach($value as $data)
            {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table>";
        return $this;
    }
}
?>