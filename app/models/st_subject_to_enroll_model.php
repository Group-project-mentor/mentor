<?php

class St_subject_to_enroll_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses() {
        $id = 3;
        $q ="select subject.id , subject.name FROM subject INNER JOIN subject_has_grade ON subject.id = subject_has_grade.subject_id INNER JOIN grade ON grade.id = subject_has_grade.grade_id WHERE grade.id=3";
        $result = $this->executeQuery($q);
        if($result->num_rows > 0)
        {
            $rows = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else
        {
            return array();
        }
    }

    public function enroll_rec($id,$gid,$sid){
        $q="INSERT INTO st_enroll_subject(student_id, grade_id, subject_id) VALUES (5,$gid,$sid )" ;
        $result = $this->executeQuery($q);
        return $result;

    }

    

}

