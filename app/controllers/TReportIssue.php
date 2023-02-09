<?php

class TReportIssue extends Controller{
    public function __construct()
    {
        session_start();
        flashMessage();
    }

    public function reportIssue(){
        $this->view('Teacher/reportissue/reportissue');
    }   

    public function reportIssueOne(){
        $this->view('Teacher/reportissue/reportIssueOne');
    } 
}

?>