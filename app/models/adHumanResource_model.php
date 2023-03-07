<?php

class adHumanResource_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClasses()
    {

        $q = "SELECT name FROM admin";
        $result = $this->executeQuery($q);
        if ($result->num_rows > 0) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return array();
        }
    }
    
}
?>