<?php

class TPremium extends Controller{
    public function __construct()
    {
        session_start();
        flashMessage();
    }

    public function premiumCheck(){
        $this->view('Teacher/Premium/premiumCheckout');
    } 
    
    public function premiumPlan(){
        $this->view('Teacher/Premium/premiumPlan');
    }
}

?>