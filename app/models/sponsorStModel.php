<?php

class sponsorStModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSponsorStudents($spID){
        $stmt = $this->prepare("SELECT student.id,user.name,user.email,student.fundMonths,student.monthlyAmount FROM student,user WHERE student.id = user.id AND sponsor_id = ? AND student.fundMonths > 0");
        $stmt->bind_param('i',$spID);
        return $this->fetchObjs($stmt);
    }

    public function getPaymentsLast($id, $month=null, $year=null){
        $stmt = $this->prepare("SELECT student_id, month, year FROM sp_pay,student WHERE sp_pay.student_id = ? AND student.id = sp_pay.student_id ORDER BY year DESC,month DESC LIMIT 1");
        $stmt->bind_param('i',$id);
        return $this->fetchOneObj($stmt);
    }

    public function getSponsorship($sponsor_id){
        $stmt = $this->prepare("SELECT student.id, sponsor_id, fundMonths, monthlyAmount, approved_date, user.name FROM student,user WHERE user.id=student.id AND sponsor_id = ?");
        $stmt->bind_param('i',$sponsor_id);
        return $this->fetchObjs($stmt);
    }

}