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
}