<?php 

class admin extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function studentCount(){
        $result = $this->getData("user", "`type` = 'st'"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }


    public function teacherCount(){
        $result = $this->getData("user", "`type` = 'tch'"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        } 
    }
}

?>