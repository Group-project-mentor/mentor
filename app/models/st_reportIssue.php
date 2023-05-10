<?php

class St_reportIssue extends Model
{

    // private $table = 'issue';

    public function __construct()
    {
        parent::__construct();
    }

    public function saveIssue($userId, $type, $descr, $solved = 0){
        $stmt = $this->prepare("INSERT INTO issue(userId, type, description, solved) VALUES (?,?,?,?)");
        $stmt->bind_param('iisi', $userId, $type, $descr, $solved);
        return $this->executePrepared($stmt);
    }

    public function getReportTypes($user){
        $stmt = $this->prepare("SELECT * FROM report_type WHERE userType = ? OR userType = 'all' ");
        $stmt->bind_param('s',$user);
        return $this->fetchObjs($stmt);
    }

    //    ? For st main page Chart -> Resources can Access
    public function getChartCounts($st_id){ //!done
        $privateClassCount = $this->prepare("SELECT COUNT(private_class.class_name) AS total FROM private_class INNER JOIN 
        classes_has_students ON private_class.class_id = classes_has_students.class_id WHERE classes_has_students.student_id = ?;");
        $privateClassCount->bind_param('i',$st_id);
        
        $privateClassPendingCount = $this->prepare("SELECT COUNT(join_requests.accept) AS pending  FROM join_requests WHERE join_requests.accept = 0 
        AND join_requests.student_id = ?;");
        $privateClassPendingCount->bind_param('i',$st_id);

        $privateClassAcceptCount = $this->prepare("SELECT COUNT(join_requests.accept) AS accept FROM join_requests WHERE join_requests.accept = 1 
        AND join_requests.student_id = ?;");
        $privateClassAcceptCount->bind_param('i',$st_id);
        

        return $this->fetchObjs($privateClassCount);
    }
}
