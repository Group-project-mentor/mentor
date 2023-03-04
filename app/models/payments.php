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
}