<?php

class TBilling extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function Billing1(){
        $res1 = $this->model('BillingModel')->getClassPayments();
        $this->view('Teacher/Billing/Billing1',array($res1));
    }   

    public function BillForm(){
        $this->view('Teacher/Billing/Billing2');
    } 

    public function transHistory(){
        $this->view('Teacher/Billing/transactionHistory');
    } 

}

?>