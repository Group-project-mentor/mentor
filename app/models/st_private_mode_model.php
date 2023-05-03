<?php

class St_private_mode_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClasses($sid)
    {
        $q = "SELECT classes_has_students.student_id , classes_has_students.class_id , private_class.class_name FROM classes_has_students 
        INNER JOIN private_class ON classes_has_students.class_id = private_class.class_id WHERE classes_has_students.student_id = ? AND classes_has_students.access = 1;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $sid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses1($sid)
    {
        $q = "SELECT classes_has_students.student_id , classes_has_students.class_id , private_class.class_name FROM classes_has_students 
        INNER JOIN private_class ON classes_has_students.class_id = private_class.class_id 
        WHERE classes_has_students.student_id = ? AND classes_has_students.access = 0;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $sid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClasses3($sid, $access, $cid)
    {
        $q = "UPDATE `classes_has_students` SET `access`=$access WHERE class_id=$cid AND student_id=$sid;";
        $result = $this->executeQuery($q);
        return $result;
    }


    public function getClasses2($grade_id, $student_id)
    {
        $q = "SELECT * from st_enroll_subject INNER JOIN subject on st_enroll_subject.subject_id = subject.id WHERE st_enroll_subject.grade_id = ? and st_enroll_subject.student_id = ? ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $grade_id, $student_id);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function jointoken($token)
    {

        $q = "SELECT private_class.class_id FROM private_class WHERE private_class.token = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $token);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function jointokenaddtoDB($sid, $cid, $token)
    {
        $q = "INSERT INTO `join_requests` (`student_id`, `class_id`, `accept`, `validity`, `token`) 
        VALUES ($sid, $cid, 0 , NULL, '$token');";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function jointokenview($sid,$cid,$token)
    {
        $q = "SELECT private_class.class_name FROM private_class 
        INNER JOIN join_requests ON private_class.class_id = join_requests.class_id WHERE private_class.token = ? LIMIT 1;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $token);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }
}
