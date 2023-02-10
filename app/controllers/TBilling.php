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
        $this->view('Teacher/Billing/Billing1');
    }   

    public function Billing2(){
        $this->view('Teacher/Billing/Billing2');
    } 

    public function transHistory(){
        $this->view('Teacher/Billing/transactionHistory');
    } 
}

?>