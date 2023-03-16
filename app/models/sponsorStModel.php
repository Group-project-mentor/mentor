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

    public function getPayments($id){
        $stmt = $this->prepare("SELECT student_id, month, year FROM sp_pay WHERE sp_pay.student_id = ?");
        $stmt->bind_param('i',$id);
        return $this->fetchObjs($stmt);
    }

    public function getSponsorship($sponsor_id){
        $stmt = $this->prepare("SELECT student.id, sponsor_id, fundMonths, monthlyAmount, approved_date, user.name FROM student,user WHERE user.id=student.id AND sponsor_id = ?");
        $stmt->bind_param('i',$sponsor_id);
        return $this->fetchObjs($stmt);
    }

    public function getPaymentDetails($id){
        $stmt = $this->prepare("SELECT * FROM payment WHERE payment.paymentId = ?");
        $stmt->bind_param('i',$id);
        return $this->fetchOneObj($stmt);
    }

    public function getBillNo($userID){
        $stmt = $this->prepare("SELECT id FROM bill WHERE user_id = ? and status = 0");
        $stmt->bind_param('i',$userID);
        return $this->fetchOneObj($stmt);
    }

    public function getPayBill($payID){
        $stmt = $this->prepare("SELECT id FROM bill WHERE payment_id = ?");
        $stmt->bind_param('i',$payID);
        return $this->fetchOneObj($stmt);
    }

    public function getBillDetails($billID,$userID){
        $stmt = $this->prepare("SELECT * FROM bill WHERE id = ? AND user_id = ?");
        $stmt->bind_param('ii',$billID,$userID);
        return $this->fetchOneObj($stmt);
    }

    public function getBillData($billID){
        $stmt = $this->prepare("SELECT student_id, name, month, year, billNo, monthlyAmount FROM sp_pay,student,user 
                                                            WHERE student.id = sp_pay.student_id AND user.id = student.id AND sp_pay.billNo = ?");
        $stmt->bind_param('i',$billID);
        return $this->fetchObjs($stmt);
    }

    public function addBill($id, $currency, $amount, $uid, $status = 0){
        $stmt = $this->prepare("INSERT INTO bill (bill.id,bill.currency,bill.amount,bill.user_id,bill.status) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssdii",$id, $currency, $amount, $uid, $status);
        return $this->executePrepared($stmt);
    }

    public function checkNotPaidBill($uid){
        $stmt = $this->prepare("SELECT id FROM bill WHERE user_id = ? AND status = 0");
        $stmt->bind_param('i',$uid);
        return $this->fetchObjs($stmt);
    }

    public function insertBillRow($stID, $year, $month, $bill_id){
        $stmt = $this->prepare("INSERT INTO sp_pay(sp_pay.student_id, sp_pay.year,sp_pay.month, sp_pay.billNo) VALUES (?,?,?,?)");
        $stmt->bind_param("iiis",$stID, $year, $month, $bill_id);
        return $this->executePrepared($stmt);
    }

    public function deleteBill($bill_id,$user_id){
        $stmt = $this->prepare("DELETE FROM bill WHERE bill.id = ? AND bill.user_id = ? AND bill.status = 0");
        $stmt->bind_param("ii", $bill_id,$user_id);
        return $this->executePrepared($stmt);
    }


}