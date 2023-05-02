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
        $res2 = $this->model('BillingModel')->getClassWithdraw();
        $res3 = $this->model("teacher_data")->getClasses($_SESSION['id']);
        $this->view('Teacher/Billing/Billing1',array($res1,$res2,$res3));
    }   

    public function BillForm(){
        $this->view('Teacher/Billing/Billing2');
    } 

    public function transHistory(){
        $this->view('Teacher/Billing/transactionHistory');
    } 

}

?>