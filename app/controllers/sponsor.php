<?php

class Sponsor extends Controller
{
    private string $user = "sp";
    private string $table1 = "sponsorStModel";
    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index(){

    }

    public function allStudents(){
        $result = $this->model($this->table1)->getSponsorStudents($_SESSION['id']);
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
        $sponsorships = $this->model($this->table1)->getSponsorship($_SESSION['id']); //! student_id, month, year, fundMonths, monthlyAmount, , fundMonths, approved_date

//        ? check if sponsor has/not students assigned
        if(!empty($sponsorships)){

//        ? loop through that data
            foreach ($sponsorships as $row){
                $acceptedDate = explode("-",$row->approved_date);
                $accMonth = intval($acceptedDate[1]);
                $accYear = intval($acceptedDate[0]);
                $fundMonths = $row->fundMonths;


                // ? get the last paid month of each student
                $payments = $this->model($this->table1)->getPayments($row->id); //! student_id, month, year

                if (!empty($payments)) {
                    if ($fundMonths > 0){
                        $timeArray = array();

                        foreach ($payments as $payment){
                            $payDate = $payment->year."-".$payment->month;
                            $timeArray[] = $payDate;
    //                    var_dump(in_array($payDate,$timeArray));
                        }

                        if ($year == $accYear){
                            for ($i=$accMonth;$i<=$month;$i++){
                                $thisDate = $year."-".$i;
                                if(!in_array($thisDate,$timeArray)){
                                    $rowArray[] = array(
                                        "student_id"=>$row->id,
                                        "name" => $row->name,
                                        "year" => $year,
                                        "month" => $i,
                                        "amount" => $row->monthlyAmount
                                    );
                                }
                                $fundMonths --;
                                if ($fundMonths <= 0){
                                    break;
                                }

                            }
                        }else {
                            for ($i = $accMonth; $i <= 12; $i++) {
                                $thisDate = $accYear . "-" . $i;
                                if (!in_array($thisDate, $timeArray)) {
                                    $rowArray[] = array(
                                        "student_id" => $row->id,
                                        "name" => $row->name,
                                        "year" => $accYear,
                                        "month" => $i,
                                        "amount" => $row->monthlyAmount
                                    );
                                }
                                $fundMonths -= 1;
                                if ($fundMonths <= 0){
                                    break;
                                }
                            }
                            if ($fundMonths > 0){
                                for ($i = 1; $i <= $month; $i++) {
                                    $thisDate = $year . "-" . $i;
                                    if (!in_array($thisDate, $timeArray)) {
                                        $rowArray[] = array(
                                            "student_id" => $row->id,
                                            "name" => $row->name,
                                            "year" => $year,
                                            "month" => $i,
                                            "amount" => $row->monthlyAmount
                                        );
                                    }
                                    $fundMonths --;
                                    if ($fundMonths <= 0){
                                        break;
                                    }
                                }
                            }

                        }
                    }

                    //? If no paid any payment until assigned that student
                } else{

                    if($accYear < $year and $row->fundMonths > 0){
                        for ($i = $accMonth ; $i <= 12; $i++){
                            $rowArray[] = array(
                                "student_id"=>$row->id,
                                "name" => $row->name,
                                "year" => $accYear,
                                "month" => $i,
                                "amount" => $row->monthlyAmount
                            );
                            $fundMonths --;
                            if ($fundMonths <= 0){
                                break;
                            }
                        }
                        if ($fundMonths > 0) {
                            for ($i = 1; $i <= $month; $i++) {
                                $rowArray[] = array(
                                    "student_id" => $row->id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                                $fundMonths--;
                                if ($fundMonths <= 0) {
                                    break;
                                }
                            }
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
                                $fundMonths--;
                                if ($fundMonths <= 0) {
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
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
//        echo "hllo";
        $id = getUnique($_SESSION['id']);
        $currency = $_POST['currency'];
        $amount = $_POST['amount'];
        $response = array();
        
        if(empty($this->model($this->table1)->checkNotPaidBill($_SESSION['id']))){
            if($this->model($this->table1)->addBill($id, $currency, $amount, $_SESSION['id'])){
                $response['status'] = 1;
                $response['message'] = "Bill created successfully !";
                $response['billNo'] = $id;
            }else{
                $response['status'] = 0;
                $response['message'] = "Error in creating the bill !";
            }
        }else{
            $response['status'] = 0;
            $response['message'] = "Another unpaid bill already exist !";
        }
        echo json_encode($response);
    }

    public function insertBillData(){
        $month = $_POST['month'];
        $year = $_POST['year'];
        $billNo = $_POST['billNo'];
        $student_id = $_POST['student_id'];

        $response = array();
        $res = $this->model($this->table1)->insertBillRow($student_id,  $year, $month, $billNo);
        if($res){
            $response['status'] = 1;
        }else{
            $response['status'] = 0;
        }
        echo json_encode($response);
    }

    public function deleteBillData(){

    }

    public function slips($viewType, $id){
        switch ($viewType){
            case "payments":
                $result =$this->model($this->table1)->getPaymentDetails($id);
                $this->view("sponsor/detailedViews/paymentView",array($result));
                break;
            case "bills":
                $billDetails =$this->model($this->table1)->getBillDetails($id,$_SESSION['id']);
                $billContent = $this->model($this->table1)->getBillData($id);
                $total = 0;
                foreach ($billContent as $one){
                    $total += $one->monthlyAmount;
                }
                $this->view("sponsor/detailedViews/billView",array($billDetails,$billContent,$total));
                break;
            default:
                break;
        }
    }

    //    public function paymentsInProgressOld(){
//        $rowArray = array();
//        $month = intval(date('m'));
//        $year = intval(date('Y'));
////        var_dump($year,$month);
//        $sponsorships = $this->model($this->table1)->getSponsorship($_SESSION['id']); //! student_id, month, year
//
////        ? check if sponsor has/not students assigned
//        if(!empty($sponsorships)){
//
////        ? loop through that data
//            foreach ($sponsorships as $row){
//
////          TODO : has a critical issue in this if statement : Logical Error
////                ! There is no check of previous months payments so can't detect them after paying to a front month
//
//                // ? get the last paid month of each student
//                $lastPayment = $this->model($this->table1)->getPaymentsLast($row->id); //! student_id, month, year, fundMonths, monthlyAmount
//                if (!empty($lastPayment)){
//                    if((intval($lastPayment->year)) < $year ){  //? If last funded on last year
//                        if ($row->fundMonths > 0){
//
//                            //? last year data
//                            for ($i = intval($lastPayment->month)+1 ; $i <= 12; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$lastPayment->student_id,
//                                    "name" => $row->name,
//                                    "year" => intval($lastPayment->year),
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//
//                            //? this year data
//                            for ($i = 1; $i <= $month; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$lastPayment->student_id,
//                                    "name" => $row->name,
//                                    "year" => $year,
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//                        }
//                    }
//
//                    //? If last funded on this year
//                    elseif((intval($lastPayment->year)) == $year){
//                        if (intval($lastPayment->month) < $month and ($row->fundMonths > 0)){
//                            for ($i = intval($lastPayment->month)+1 ; $i <= $month; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$lastPayment->student_id,
//                                    "name" => $row->name,
//                                    "year" => $year,
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//                        }
//                    }
//
//                //? If no paid any payment until assigned that student
//                } else{
//                    $acceptedDate = explode("-",$row->approved_date);
//                    $accMonth = intval($acceptedDate[1]);
//                    $accYear = intval($acceptedDate[0]);
//
//                    if($accYear < $year and $row->fundMonths > 0){
//                            for ($i = $accMonth ; $i <= 12; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$row->id,
//                                    "name" => $row->name,
//                                    "year" => $accYear,
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//                            for ($i = 1; $i <= $month; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$row->id,
//                                    "name" => $row->name,
//                                    "year" => $year,
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//                    }
//                    elseif($accYear == $year){
//                        if ($accMonth <= $month and ($row->fundMonths > 0)){
//                            for ($i = $accMonth; $i <= $month; $i++){
//                                $rowArray[] = array(
//                                    "student_id"=>$row->id,
//                                    "name" => $row->name,
//                                    "year" => $year,
//                                    "month" => $i,
//                                    "amount" => $row->monthlyAmount
//                                );
//                            }
//                        }
//                    }
//                }
//            }
//        }
////        foreach ($rowArray as $r){
////            print_r($r);
////            echo '<br />';
////        }
//        $this->view('sponsor/payments/paymentsInProgress',array($rowArray,$sponsorships));
//    }

}