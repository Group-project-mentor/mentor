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

    public function allStudents(){
        $result = $this->model("sponsorStModel")->getSponsorStudents($_SESSION['id']);
        $this->view('sponsor/student_progress/student_report',array($result));
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
        $rowArray = array();
        $month = intval(date('m'));
        $year = intval(date('Y'));
//        var_dump($year,$month);
        $sponsorships = $this->model('sponsorStModel')->getSponsorship($_SESSION['id']); //! student_id, month, year

//        ? check if sponsor has/not students assigned
        if(!empty($sponsorships)){

//        ? loop through that data
            foreach ($sponsorships as $row){

                // ? get the last paid month of each student
                $lastPayment = $this->model('sponsorStModel')->getPaymentsLast($row->id); //! student_id, month, year, fundMonths, monthlyAmount
                if (!empty($lastPayment)){
                    if((intval($lastPayment->year)) < $year ){  //? If last funded on last year
                        if ($row->fundMonths > 0){

                            //? last year data
                            for ($i = intval($lastPayment->month) ; $i <= 12; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$lastPayment->student_id,
                                    "name" => $row->name,
                                    "year" => intval($lastPayment->year),
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }

                            //? this year data
                            for ($i = 1; $i <= $month; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$lastPayment->student_id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }
                        }
                    }

                    //? If last funded on this year
                    elseif((intval($lastPayment->year)) == $year){
                        if (intval($lastPayment->month) < $month and ($row->fundMonths > 0)){
                            for ($i = intval($lastPayment->month) ; $i <= $month; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$lastPayment->student_id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }
                        }
                    }

                //? If no paid any payment until assigned that student
                } else{
                    $acceptedDate = explode("-",$row->approved_date);
                    $accMonth = intval($acceptedDate[1]);
                    $accYear = intval($acceptedDate[0]);

                    if($accYear < $year and $row->fundMonths > 0){
                            for ($i = $accMonth ; $i <= 12; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$row->id,
                                    "name" => $row->name,
                                    "year" => $accYear,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }
                            for ($i = 1; $i <= $month; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$row->id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }
                    }
                    elseif($accYear == $year){
                        if ($accMonth <= $month and ($row->fundMonths > 0)){
                            for ($i = $accMonth; $i <= $month; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$row->id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                            }
                        }
                    }
                }
            }
        }
//        foreach ($rowArray as $r){
//            print_r($r);
//            echo '<br />';
//        }
        $this->view('sponsor/payments/paymentsInProgress',array($rowArray,$sponsorships));
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