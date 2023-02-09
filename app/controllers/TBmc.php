<?php

class TBMC extends Controller{
    public function __construct()
    {
        session_start();
      
    }

    public function BMC1(){
        $this->view('Teacher/BMC/BMC1');
    }   

    public function BMC2(){
        $this->view('Teacher/BMC/BMC2');
    } 

}

?>