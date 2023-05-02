<?php

class sponsorStModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSponsorStudents($spID, $offset, $limit)
    {
        $stmt = $this->prepare("SELECT student.id,user.name,user.email,student.fundMonths,student.monthlyAmount FROM student,user WHERE student.id = user.id AND sponsor_id = ? AND student.fundMonths > 0 LIMIT ?,?");
        $stmt->bind_param('iii', $spID, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function getSponsorStudentsCount($spID)
    {
        $stmt = $this->prepare("SELECT COUNT(student.id) AS count FROM student,user WHERE student.id = user.id AND sponsor_id = ? AND student.fundMonths > 0");
        $stmt->bind_param('i', $spID);
        return $this->fetchOneObj($stmt);
    }

    public function getSponsorStudentsSearch($spID, $search)
    {
        $stmt = $this->prepare("SELECT student.id,user.name,user.email,student.fundMonths,student.monthlyAmount FROM student,user
                                        WHERE student.id = user.id AND sponsor_id = ? AND student.fundMonths > 0
                                        AND (user.name LIKE ? OR student.id LIKE ? OR user.email LIKE ?)");
        $search = "%$search%";
        $stmt->bind_param('isss', $spID, $search, $search, $search);
        return $this->fetchObjs($stmt);
    }

    public function getPaymentsLast($id, $month = null, $year = null)
    {
        $stmt = $this->prepare("SELECT student_id, month, year FROM sp_pay,student WHERE sp_pay.student_id = ? AND student.id = sp_pay.student_id ORDER BY year DESC,month DESC LIMIT 1");
        $stmt->bind_param('i', $id);
        return $this->fetchOneObj($stmt);
    }

    public function getPayments($id)
    {
        $stmt = $this->prepare("SELECT student_id, month, year FROM sp_pay WHERE sp_pay.student_id = ?");
        $stmt->bind_param('i', $id);
        return $this->fetchObjs($stmt);
    }

    public function getSponsorship($sponsor_id)
    {
        $stmt = $this->prepare("SELECT student.id, sponsor_id, fundMonths, monthlyAmount, approved_date, user.name FROM student,user WHERE user.id=student.id AND sponsor_id = ?");
        $stmt->bind_param('i', $sponsor_id);
        return $this->fetchObjs($stmt);
    }

    public function getPaymentDetails($id)
    {
        $stmt = $this->prepare("SELECT * FROM payment WHERE payment.paymentId = ?");
        $stmt->bind_param('i', $id);
        return $this->fetchOneObj($stmt);
    }

    public function getBillNo($userID)
    {
        $stmt = $this->prepare("SELECT id FROM bill WHERE user_id = ? and status = 0");
        $stmt->bind_param('i', $userID);
        return $this->fetchOneObj($stmt);
    }

    public function getPayBill($payID)
    {
        $stmt = $this->prepare("SELECT id FROM bill WHERE payment_id = ?");
        $stmt->bind_param('i', $payID);
        return $this->fetchOneObj($stmt);
    }

    public function getBillDetails($billID, $userID)
    {
        $stmt = $this->prepare("SELECT * FROM bill WHERE id = ? AND user_id = ?");
        $stmt->bind_param('si', $billID, $userID);
        return $this->fetchOneObj($stmt);
    }

    public function getBillData($billID)
    {
        $stmt = $this->prepare("SELECT student_id, name, month, year, billNo, monthlyAmount FROM sp_pay,student,user WHERE student.id = sp_pay.student_id AND user.id = student.id AND sp_pay.billNo = ?");
        $stmt->bind_param('s', $billID);
        return $this->fetchObjs($stmt);
    }

    public function addBill($id, $currency, $amount, $uid, $status = 0)
    {
        $stmt = $this->prepare("INSERT INTO bill (bill.id,bill.currency,bill.amount,bill.user_id,bill.status) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssdii", $id, $currency, $amount, $uid, $status);
        return $this->executePrepared($stmt);
    }

    public function checkNotPaidBill($uid)
    {
        $stmt = $this->prepare("SELECT id FROM bill WHERE user_id = ? AND status = 0");
        $stmt->bind_param('i', $uid);
        return $this->fetchObjs($stmt);
    }

    public function insertBillRow($stID, $year, $month, $bill_id)
    {
        $stmt = $this->prepare("INSERT INTO sp_pay(sp_pay.student_id, sp_pay.year,sp_pay.month, sp_pay.billNo) VALUES (?,?,?,?)");
        $stmt->bind_param("iiis", $stID, $year, $month, $bill_id);
        return $this->executePrepared($stmt);
    }

    public function deleteBill($bill_id, $user_id)
    {
        $stmt = $this->prepare("DELETE FROM bill WHERE bill.id = ? AND bill.user_id = ? AND bill.status = 0");
        $stmt->bind_param("ii", $bill_id, $user_id);
        return $this->executePrepared($stmt);
    }

    public function getApprovedStudents()
    {
        $stmt = $this->prepare("SELECT student.id,user.name,student.monthlyAmount FROM student,user WHERE user.id = student.id AND student.sponsor_id IS NULL AND student.approved_by IS NOT NULL");
        return $this->fetchObjs($stmt);
    }

    public function getApprovedStudentsSearch($search)
    {
        $stmt = $this->prepare("SELECT student.id,user.name,student.monthlyAmount FROM student,user WHERE user.id = student.id AND student.sponsor_id IS NULL AND student.approved_by IS NOT NULL
                                        AND (student.id LIKE ? OR user.name LIKE ? OR monthlyAmount LIKE ?)");
        $search = "%$search%";
        $stmt->bind_param("sss", $search, $search, $search);
        return $this->fetchObjs($stmt);
    }

    public function connectSponsor($st_id, $sp_id)
    {
        $stmt = $this->prepare("UPDATE student SET sponsor_id = ? WHERE student.id = ?");
        $stmt->bind_param("ii", $sp_id, $st_id);
        return $this->executePrepared($stmt);
    }

    public function isStudentStatus($id, $status)
    {
        $stmt = $this->prepare("SELECT id from student WHERE id = ? AND status = ?");
        $stmt->bind_param("is", $id, $status);
        return $this->fetchOneObj($stmt);
    }

    public function getTotalPaidData($id)
    {
        $stmt = $this->prepare("SELECT student.id AS id, user.name AS name, (fundMonths*monthlyAmount) AS total
                                        FROM student,user WHERE student.id = user.id AND sponsor_id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchObjs($stmt);
    }

    public function getTotalFundedAmount($id)
    {
        $stmt = $this->prepare("SELECT SUM(st.monthlyAmount) AS total FROM sp_pay sp LEFT JOIN student st on sp.student_id = st.id
                WHERE st.sponsor_id = ? ");
        $stmt->bind_param("i", $id);
        return $this->fetchOneObj($stmt);
    }

    public function getMonthlyData($id)
    {
        $stmt = $this->prepare("SELECT student.id, user.name, student.monthlyAmount FROM user,student WHERE student.id = user.id AND sponsor_id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchObjs($stmt);
    }

    public function getMonthlyBillData($id, $year)
    {
        $stmt = $this->prepare("SELECT b.id, p.currency, p.amount, p.timestamp FROM bill b,payment p WHERE p.paymentId = b.payment_id AND b.user_id = ? AND YEAR(p.timestamp) = ? AND b.payment_id IS NOT NULL");
        $stmt->bind_param("ii", $id, $year);
        return $this->fetchObjs($stmt);
    }

    public function getMyData($id)
    {
        $stmt = $this->prepare("SELECT * FROM sponsor WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchOneObj($stmt);
    }

    public function getStudentDetails($id)
    {
        $stmt = $this->prepare("SELECT user.id, user.email, user.name, user.image, student.fundMonths, student.monthlyAmount, student.approved_date FROM user,student WHERE user.id = student.id AND user.id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchOneObj($stmt);
    }

    public function getSubjectDetails($id)
    {
        $stmt = $this->prepare("SELECT DISTINCT(subject.name) AS sub FROM subject, st_enroll_subject WHERE subject.id = st_enroll_subject.subject_id AND st_enroll_subject.student_id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchObjs($stmt);
    }

    public function getGradeDetails($id)
    {
        $stmt = $this->prepare("SELECT DISTINCT(grade.name) AS grd FROM grade, st_enroll_subject WHERE grade.id = st_enroll_subject.grade_id AND st_enroll_subject.student_id = ?");
        $stmt->bind_param("i", $id);
        return $this->fetchObjs($stmt);
    }

}
