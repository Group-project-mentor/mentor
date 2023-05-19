<?php

class St_generate_reports_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function JoinedClasses($id)
    {
        $q = "SELECT COUNT(classes_has_students.class_id) AS c FROM
        classes_has_students WHERE classes_has_students.student_id = ? AND classes_has_students.accept = 1;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function RequestClasses($id)
    {
        $q = "SELECT COUNT(classes_has_students.class_id) AS c FROM
        classes_has_students WHERE classes_has_students.student_id = ? AND classes_has_students.accept = 0;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function PendingClasses($id)
    {
        $q = "SELECT COUNT(join_requests.student_id) AS c 
        FROM join_requests WHERE join_requests.student_id = ? AND join_requests.accept = 0 ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function QEnrollClasses($id)
    {
        $q = "SELECT COUNT(quizresults.user_id) AS c 
        FROM quizresults WHERE quizresults.user_id = ? AND quizresults.status = 1;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function SEnrollClasses($id)
    {
        $q = "SELECT COUNT(st_enroll_subject.student_id) AS c 
        FROM st_enroll_subject WHERE st_enroll_subject.student_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function PublicResourceCount($id)
    {
        $q = "SELECT COUNT(public_resource.id) AS c,public_resource.type FROM public_resource GROUP BY public_resource.type;";
        $stmt = $this->prepare($q);
        // $stmt->bind_param('i', $id);

        $result = $this->fetchObjs($stmt);
        return $result;
    }
}
