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
        $stmt->bind_param('issi', $userId, $type, $descr, $solved);
        return $stmt->execute();
    }
}
