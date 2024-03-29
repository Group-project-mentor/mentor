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

    public function getClasses3($grade_id,$student_id) {
        $q ="SELECT * from st_enroll_subject INNER JOIN subject on st_enroll_subject.subject_id = subject.id WHERE st_enroll_subject.grade_id = ? and st_enroll_subject.student_id = ? ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$grade_id,$student_id);
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses4($id) {
        $q ="SELECT subject.id,subject.name FROM subject INNER JOIN subject_has_grade ON subject.id = subject_has_grade.subject_id
        INNER JOIN grade ON grade.id = subject_has_grade.grade_id WHERE grade.id = ?";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses5($grade,$subject) {
        $q ="DELETE FROM st_enroll_subject WHERE subject_id =$subject AND grade_id = $grade AND student_id =$_SESSION[id];";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function enroll_rec($id,$gid,$sid){
        $q="INSERT INTO st_enroll_subject(student_id, grade_id, subject_id) VALUES ($id,$gid,$sid )" ;
        $result = $this->executeQuery($q);
        return $result;

    }

}

