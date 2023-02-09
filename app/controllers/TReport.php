<?php

class TReport extends Controller{
    public function __construct()
    {
        session_start();
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