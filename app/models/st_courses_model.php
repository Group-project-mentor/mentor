<?php

class St_courses_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses($id) {
        $q ="SELECT subject.id , subject.name FROM subject INNER JOIN subject_has_grade ON subject.id = subject_has_grade.subject_id INNER JOIN grade ON grade.id = subject_has_grade.grade_id WHERE grade.id=?";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses2($grade_id,$student_id) {
        $q ="SELECT * from st_enroll_subject INNER JOIN subject on st_enroll_subject.subject_id = subject.id WHERE st_enroll_subject.grade_id = ? and st_enroll_subject.student_id = ? ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$grade_id,$student_id);
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

}

