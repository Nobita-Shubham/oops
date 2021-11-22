<?php

class App
{
    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "laravel1";
    private $connection;

    public function __construct()
    {
        try 
        {
            $this->connection = new PDO("mysql:host=$this->server;dbname=$this->db_name", $this->user, $this->password);
        } 
        catch (PDOException $e) 
        {
            echo "Error:".$e;
        }
    }

    public function select($table, $column = "", $value="")
    {
        $sql = "SELECT * FROM `$table`";
        if($column != "" && $value != "")
        {
            $sql .= " WHERE `$column` = '$value'";
        }
        $result = $this->connection->query($sql);
        $data = $result->fetchAll();
        return $data;
    }

    public function delete($table, $column, $value)
    {
        $sql = "DELETE FROM `$table` WHERE $column = '$value'";
        $this->connection->query($sql);
    }

    public function create($table, $arr)
    {
        if(!empty($arr))
        {
         foreach($arr as $key=>$value)
            {
                $columnArr[] = $key;
                $valuesArr[] = $value;
            } 
                $columnArr = implode("," , $columnArr);
                $valuesArr = implode("','", $valuesArr);
                $sql = "INSERT INTO `$table`($columnArr) VALUES ('$valuesArr')";
                $this->connection->query($sql);
        }
    }

    public function update($table, $arr, $column, $values)
    {
        if(!empty($arr))
        {
            $sql = "UPDATE $table SET ";
            $count = count($arr);
            $i = 1;
            foreach($arr as $key=>$value)
            {
                if($i == $count)
                {
                    $sql .= "$key = '$value'";
                }else{
                    $sql .= "$key = '$value', ";
                }
                $i++;
            }
            $sql .= " WHERE $column = $values";
            // echo $sql;
        }
        $this->connection->query($sql);
    }
}

?>