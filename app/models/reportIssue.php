<?php

class ReportIssue extends Model
{

    private $table = 'complaint';

    public function __construct()
    {
        parent::__construct();
    }

    public function saveIssue($userId, $type, $descr, $solved = "in Progress"){
        $stmt = $this->prepare("INSERT INTO complaint(user_id, category, description, status) VALUES (?,?,?,?);");
        $stmt->bind_param('iiss', $userId, $type, $descr, $solved);
        return $this->executePrepared($stmt);
    }

    public function getReportTypes($user){
        $stmt = $this->prepare("SELECT * FROM report_type WHERE userType = ? OR userType = 'all' ");
        $stmt->bind_param('s',$user);
        return $this->fetchObjs($stmt);
    }
}
