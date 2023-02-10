<?php

class Sponsor extends Controller
{
    public function __construct(){
        sessionValidator();
    }

    public function index(){

    }

    public function student_report(){
        $this->view('sponsor/student_progress/student_report');
    }

    public function new_student(){
        $this->view('sponsor/student_progress/new_student');
    }

    public function see_student(){
        $this->view('sponsor/student_progress/see_student');
    }

    public function profile(){
        $this->view('sponsor/profile/sp_profile');
    }

    public function reportIssue(){
        $this->view('sponsor/reportIssue/report');
    }

    public function transactionHistory(){
        $this->view('sponsor/payments/transactionHistory');
    }

    public function paymentsInProgress(){
        $this->view('sponsor/payments/paymentsInProgress');
    }
}