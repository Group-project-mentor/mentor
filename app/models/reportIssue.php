<?php

class ReportIssue extends Model
{

    private $table = 'issue';

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
}
