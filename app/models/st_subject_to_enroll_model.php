<?php

class St_subject_to_enroll_model extends Model{
    public function __construct(){
        parent::__construct();
    }


    public function enroll_rec($id,$gid,$sid){
        $q="INSERT INTO st_enroll_subject(student_id, grade_id, subject_id) VALUES ($id,$gid,$sid )" ;
        $result = $this->executeQuery($q);
        return $result;

    }

    

}

?>

