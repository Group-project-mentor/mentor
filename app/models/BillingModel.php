<?php
class BillingModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClassPayments()
    {
        $q = "select student_pay.amount FROM student_pay inner join
              teacher_has_class on teacher_has_class.class_id = student_pay.class_id where teacher_has_class.teacher_id=?; ";
        $result = $this->prepare($q);
        $result->bind_param('i', $_SESSION['id']);
        return $this->fetchObjs($result);
    }

    public function getClassWithdraw()
    {
        $q = "select withdraw.amount FROM withdraw inner join user on user.id= withdraw.user_id and user.type='tch' where withdraw.user_id=?; ";
        $result = $this->prepare($q);
        $result->bind_param('i', $_SESSION['id']);
        return $this->fetchObjs($result);
    }

    public function addWithdraw($id1,$id2,$id3,$id4)
    {
        $q = "INSERT INTO withdraw (user_id, bank_name, account_number, account_name, amount) VALUES (" . $_SESSION['id'] . ", '" . $id1 . "', '" . $id2 . "', '" . $id3 . "', '" . $id4 . "')";

        $result = $this->executeQuery($q);
        return $result;
    }

    //    ? Filtering Functions
    public function getFilteredIncome($tid, $cid = 0, $year = 0,$month=0)
    {
        if($cid!=0 and $year!=0 and $month!=0){
            $stmt = $this->prepare("select student_pay.amount FROM student_pay inner join teacher_has_class on teacher_has_class.class_id = student_pay.class_id where 
            teacher_has_class.teacher_id=? and student_pay.class_id=? AND student_pay.year=? AND student_pay.month=?;");
            $stmt->bind_param('iiii',$tid,$cid,$yeasr,$month);
        }
        return $this->fetchObjs($stmt);
    }
}