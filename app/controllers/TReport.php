<?php

class TReport extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function generateReport(){
        $this->view('Teacher/report/generateReport');
    }   

    public function generateReportOne(){
        $this->view('Teacher/report/generateReportOne');
    } 
}

?>