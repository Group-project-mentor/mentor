<?php

class Sponsor extends Controller
{
    private string $user = "sp";
    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
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
        $res = $this->model('payments')->getTrasactionHistory($_SESSION['id']);
        $this->view('sponsor/payments/transactionHistory',array($res));
    }

    public function paymentsInProgress(){
        $this->view('sponsor/payments/paymentsInProgress');
    }

    public function paymentTest1(){
        $this->view('sponsor/payments/paymentForm');
    }

    public function paymentTest(){
        $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
        $this->view('sponsor/payments/paymentForm2',array($res));
    }

    public function paymentDone(){
        $this->view('sponsor/payments/paymentDone');
    }

    public function paymentError(){
        $this->view('sponsor/payments/paymentError');
    }

    public function paymentDetails(){
        $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
        $this->view('sponsor/profile/getPaymentDetails',array($res));
    }

    public function details($method){
        if($method == "update"){
            $res = $this->model("payments")
                ->updatePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
            flashMessage("Successfully Updated!");
        }
        elseif ($method == "add"){
            $res = $this->model("payments")
                ->savePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
            flashMessage("Successfully Added!");
        }
        else{
            flashMessage("invalid operation");
        }
        header("location:".BASEURL."sponsor/profile");
    }

    public function createBill(){
        
    }

}