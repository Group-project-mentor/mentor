<?php

class St_billing_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkbeforeEnter($student_id,$class_id){
        $q = "SELECT st_billing.class_id  FROM st_billing WHERE st_billing.class_id = ? AND st_billing.student_id = ? AND st_billing.active_state = 1 
        AND NOW() BETWEEN st_billing.buy_timestamp AND st_billing.expire_timestamp ;" ;
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $class_id,$student_id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }


    public function getstudentBillingDEtails($student_id,$class_id){
        $q = "SELECT st_billing.class_id , st_billing.class_fee_id, private_class.class_name , MONTH(st_billing.buy_timestamp) as month, YEAR(st_billing.buy_timestamp) as year , private_class.fees FROM st_billing , private_class 
        WHERE st_billing.class_id = private_class.class_id AND st_billing.student_id = ? AND st_billing.class_id = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $student_id,$class_id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    
    public function getclassAmount($student_id,$class_id){
        $q = "SELECT  private_class.fees  FROM private_class WHERE private_class.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$class_id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    
    public function prepareDetailForBill($student_id,$class_id){
        $q = "SELECT private_class.class_id , private_class.fees  , private_class.class_name FROM private_class WHERE
        private_class.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$class_id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function haspayment_Details($student_id)
    {
        $stmt = $this->prepare("SELECT user_payment_details.firstName ,user_payment_details.lastName , user_payment_details.payEmail , user_payment_details.payPhone , user_payment_details.address 
        ,user_payment_details.city , user_payment_details.country FROM `user_payment_details` WHERE user_payment_details.id = ?;");
       
       $stmt->bind_param('i', $student_id);
        return $this->fetchOneObj($stmt);
    }


    public function savePayment($payID, $userID, $currency, $amount ,$description , $method,$classId){
        $stmt1 = $this->prepare("INSERT INTO payment(paymentId,userId,currency,amount,type,method) VALUES (?,?,?,?,?,?)");
        $stmt1->bind_param("iisdss",$payID,$userID,$currency,$amount,$description,$method);

        $stmt2 = $this->prepare("INSERT INTO st_billing( class_id, buy_timestamp, expire_timestamp, active_state, student_id) 
        VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH) , 1 , ?);");
        $stmt2->bind_param('ii',$classId,$userID);
        return $this->executePrepared($stmt1) and $this->executePrepared($stmt2);
    }


}
