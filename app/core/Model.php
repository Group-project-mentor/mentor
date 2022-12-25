<?php

class Model extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getData($table, $where = null, $ord = null ,$ordType = "asc", $lim = null)
    {
        $query = "select * from $table";
        if ($where != null) {
            $query = $query . " where $where";
        }
        if ($ord != null) {
            $query = $query . " order by $ord $ordType";
        }

        $result = $this->executeQuery($query);
        return $result;
    }

    public function insertData($table, $data)
    {
        $sql = "INSERT INTO $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value', ";
        }
        $sql = substr($sql, 0, -2);
        $result = $this->executeQuery($sql);
        return $result;
    }

    // public function updateData($table, $data, $where)
    // {
    //     $sql = "UPDATE $table SET ";
    //     foreach ($data as $key => $value) {
    //         $sql .= "$key = '$value', ";
    //     }
    //     $sql = substr($sql, 0, -2);
    //     $sql .= " WHERE $where";
    //     $result = $this->executeQuery($sql);
    //     return $result;
    // }

    public function deleteData($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";
        $result = $this->executeQuery($sql);
        return $result;
    }
    
    public function numRows($result){
        return $result->num_rows;
    }
}
