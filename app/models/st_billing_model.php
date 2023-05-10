<?php

class St_billing_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getstudentBillingDEtails($student_id,$class_id){
        $q = "SELECT st_billing.class_id , private_class.class_name , MONTH(st_billing.buy_timestamp) as month, YEAR(st_billing.buy_timestamp) as year , private_class.fees FROM st_billing , private_class 
        WHERE st_billing.class_id = private_class.class_id AND st_billing.student_id = ? AND st_billing.class_id = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $student_id,$class_id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }


}
