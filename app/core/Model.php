<?php

class Model extends DB
{

    public function __construct()
    {
        parent::__construct();
    }

    // Gets all columns from a table with conditions
    public function getAllData($table, $where = null, $ord = null)
    {
        $query = "select * from $table";
        if ($where != null) {
            $query = $query . " where $where";
        }
        if ($ord != null) {
            $query = $query . " order by $ord";
        }

        $result = $this->executeQuery($query);
        return $result;
    }

    public function getData($table, $where = null, $ord = null)
    {
        $query = "select * from $table";
        if ($where != null) {
            $query = $query . " where $where";
        }
        if ($ord != null) {
            $query = $query . " order by $ord";
        }

        $result = $this->executeQuery($query);
        return $result;
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value', ";
        }
        $sql = substr($sql, 0, -2);
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function update($table, $data, $where)
    {
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = '$value', ";
        }
        $sql = substr($sql, 0, -2);
        $sql .= " WHERE $where";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";
        $result = $this->executeQuery($sql);
        return $result;
    }
}
