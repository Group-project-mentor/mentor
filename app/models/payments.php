<?php

class payments extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasPaymentDetails($id){
        $stmt = $this->prepare("SELECT * FROM user_payment_details WHERE id = ?");
        $stmt->bind_param('i',$id);
        return $this->fetchOneObj($stmt);
    }

    public function savePaymentDetails($id, $fName, $lName, $email, $telNo, $address, $city, $country){
        $stmt = $this->prepare("INSERT INTO user_payment_details 
                                        (id, firstName, lastName, payEmail, payPhone, address, city, country) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('isssssss',$id,$fName,$lName,$email,$telNo,$address,$city,$country);
        return $this->executePrepared($stmt);
    }

    public function updatePaymentDetails($id, $fName, $lName, $email, $telNo, $address, $city, $country){
        $stmt = $this->prepare("UPDATE user_payment_details SET firstName=?, lastName=?, payEmail=?, payPhone=?, address=?,city=?, country=? 
                                        WHERE id=?");
        $stmt->bind_param('sssssssi',$fName,$lName,$email,$telNo,$address,$city,$country,$id);
        return $this->executePrepared($stmt);
    }

    public function getTrasactionHistory($id,$offset,$limit,$filters){
        $q = "SELECT * FROM payment WHERE payment.userId = ".$id." ";
        if(!empty($filters['amountStart']) && !empty($filters['amountEnd'])){
            $q .= "AND (payment.amount >= '".$filters['amountStart']."' AND payment.amount <= '".$filters['amountEnd']."') ";
        }elseif(!empty($filters['amountStart'])){
            $q .= "AND payment.amount >= '".$filters['amountStart']."' ";
        }elseif(!empty($filters['amountEnd'])){
            $q .= "AND payment.amount <= '".$filters['amountEnd']."' ";
        }

        if(!empty($filters['startDate']) && !empty($filters['endDate'])){
            $q .= "AND (DATE(payment.timestamp) BETWEEN '".$filters['startDate']."' AND '".$filters['endDate']."') ";
        }elseif(!empty($filters['startDate'])){
            $q .= "AND DATE(payment.timestamp) >= '".$filters['startDate']."' ";
        }elseif(!empty($filters['endDate'])){
            $q .= "AND DATE(payment.timestamp) <= '".$filters['endDate']."' ";
        }

        $q .= "ORDER BY payment.timestamp DESC LIMIT ".$offset.", ".$limit;
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }

    public function getTrasactionHistoryCount($id, $filters){
        $types = "i";
        $q = "SELECT COUNT(payment.id) as count FROM payment WHERE payment.userId = ? ";
        if(!empty($filters['amountStart']) && !empty($filters['amountEnd'])){
            $q .= "AND (payment.amount >= ? AND payment.amount <= ?) ";
            $types .= "dd";
        }
        if(!empty($filters['startDate']) && !empty($filters['endDate'])){
            $q .= "AND (DATE(payment.timestamp) BETWEEN ? AND ?) ";
            $types .= "ss";
        }
        $q .= "ORDER BY payment.timestamp DESC";
        switch($types){
            case "i":
                $stmt = $this->prepare($q);
                $stmt->bind_param('i',$id);
                break;
            case "idd":
                $stmt = $this->prepare($q);
                $stmt->bind_param('idd',$id,$filters['amountStart'],$filters['amountEnd']);
                break;
            case "iss":
                $stmt = $this->prepare($q);
                $stmt->bind_param('iss',$id,$filters['startDate'],$filters['endDate']);
                break;
            case "iddss":
                $stmt = $this->prepare($q);
                $stmt->bind_param('iddss',$id,$filters['amountStart'],$filters['amountEnd'],$filters['startDate'],$filters['endDate']);
                break;
        }
        return $this->fetchOneObj($stmt);
    }

    public function savePayment($payID, $userID, $currency, $amount ,$description , $method,$billID){
        $stmt1 = $this->prepare("INSERT INTO payment(paymentId,userId,currency,amount,type,method) VALUES (?,?,?,?,?,?)");
        $stmt1->bind_param("iisdss",$payID,$userID,$currency,$amount,$description,$method);
        $stmt2 = $this->prepare("UPDATE bill SET bill.status = 1, bill.payment_id = ? WHERE bill.id = ?");
        $stmt2->bind_param('is',$payID,$billID);
        return $this->executePrepared($stmt1) and $this->executePrepared($stmt2);
    }

    public function testMe($data){
        $stmt = $this->prepare("INSERT INTO test VALUES (?)");
        $stmt->bind_param('s',$data);
        $this->executePrepared($stmt);
    }

    public function saveBMC($name,$email,$amount,$count){
        $stmt = $this->prepare("INSERT INTO bmc (name, email, count, amount) VALUES (?,?,?,?)");
        $stmt->bind_param("ssid",$name,$email,$count,$amount);
        return $this->executePrepared($stmt);
    }

    public function savePremium($name,$email,$amount){
        $stmt = $this->prepare("INSERT INTO premium (name, email, amount) VALUES (?,?,?)");
        $stmt->bind_param("ssd",$name,$email,$amount);
        return $this->executePrepared($stmt);
    }
}