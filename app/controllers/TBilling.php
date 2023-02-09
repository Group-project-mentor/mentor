<?php

class TBilling extends Controller{
    public function __construct()
    {
        session_start();
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