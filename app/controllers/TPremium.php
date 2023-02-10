<?php

class TPremium extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
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