<?php

class Enrolled_subject_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses2() {
        $id = 3;
        $q ="SELECT * from st_enroll_subject INNER JOIN subject on st_enroll_subject.subject_id = subject.id WHERE st_enroll_subject.grade_id = 3 and st_enroll_subject.student_id = 5 ";
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

}

