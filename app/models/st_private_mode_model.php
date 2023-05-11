<?php

class St_private_mode_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClasses($sid)
    {
        $q = "SELECT classes_has_students.student_id , classes_has_students.class_id , private_class.class_name , private_class.fees FROM classes_has_students 
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

    public function getClasses34($sid, $access, $cid)
    {
        $q = "DELETE FROM `classes_has_students` WHERE class_id=$cid AND student_id=$sid AND access = $access;";
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
        $qo = "SELECT COUNT(join_requests.accept) as numberOfRequests FROM join_requests 
        WHERE join_requests.student_id = ? AND join_requests.class_id = ? AND join_requests.token= ? AND join_requests.accept = 0;";
        $stmt = $this->prepare($qo);
        $stmt->bind_param('iis', $sid, $cid, $token);
        $check = $this->fetchOneObj($stmt);

        // var_dump($check->numberOfRequests);
        if ($check->numberOfRequests == 0) {
            $q = "INSERT INTO `join_requests` (`student_id`, `class_id`, `accept`, `validity`, `token`) 
        VALUES ($sid, $cid, 0 , NULL, '$token');";
            $result = $this->executeQuery($q);
            return $result;
        }
        else {
            return 0;
        }
    }

    public function jointokenview($sid, $cid, $token)
    {
        $q = "SELECT private_class.class_name , private_class.fees FROM private_class 
        INNER JOIN join_requests ON private_class.class_id = join_requests.class_id WHERE private_class.token = ? LIMIT 1;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $token);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    
    public function getClassesReportAll($id,$class_name)
    {
        $q = "SELECT teacher_report.location , teacher_report.name , private_class.class_id FROM teacher_report INNER JOIN private_class
        ON teacher_report.class_id = private_class.class_id WHERE private_class.class_name = ? AND teacher_report.student_id = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('si', $class_name,$id);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getClassesReport($id,$class_name)
    {
        $q = "SELECT teacher_report.location , teacher_report.name , private_class.class_id FROM teacher_report INNER JOIN private_class
        ON teacher_report.class_id = private_class.class_id WHERE private_class.class_name = ? AND teacher_report.student_id = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('si', $class_name,$id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

}
