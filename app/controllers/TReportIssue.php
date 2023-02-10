<?php

class TReportIssue extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function reportIssues(){
        $this->view('Teacher/reportissue/reportissueMain');
    }   

    public function reportIssueOne(){
        $this->view('Teacher/reportissue/reportIssueOne');
    } 
}

?>