<?php

class St_private_mode_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses($id) {
        $q ="SELECT classes_has_students.student_id , classes_has_students.class_id , private_class.class_name FROM classes_has_students 
        INNER JOIN private_class ON classes_has_students.class_id = private_class.class_id WHERE classes_has_students.student_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses1($id) {
        $q ="SELECT class_name , grade FROM private_class";
        $stmt = $this->prepare($q);

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
