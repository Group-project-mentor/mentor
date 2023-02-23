<?php

class TBMC extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function BMC1(){
        $this->view('Teacher/BMC/BMC1');
    }   

    public function BMC2(){
        
        $this->view('Teacher/BMC/BMC2');

    } 

}

?>