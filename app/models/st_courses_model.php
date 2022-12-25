<?php

class St_courses_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses() {
        $id = 3;
        $q ="SELECT subject.id , subject.name FROM subject INNER JOIN subject_has_grade ON subject.id = subject_has_grade.subject_id INNER JOIN grade ON grade.id = subject_has_grade.grade_id WHERE grade.id=3";
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

