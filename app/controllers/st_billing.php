<?php

class St_billing extends Controller
{

    // private string $user = "sp";
    // private string $table1 = "sponsorStModel";

    public function __construct(){
        sessionValidator();
        // $this->userValidate($this->user);
        // flashMessage();
    }

    public function index()
    {
        $this->view('student/billing/st_billing');
    }

    // public function paymentTest($bill_id){
    //     $billData = $this->model($this->table1)->getBillData($bill_id);
    //     $totalPayment = 0;
    //     foreach ($billData as $row){
    //         $totalPayment += $row->monthlyAmount;
    //     }
    //     $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
    //     $this->view('sponsor/payments/paymentForm2',array($res,$bill_id,$totalPayment));
    // }

    // public function paymentDone(){
    //     $this->view('sponsor/payments/paymentDone');
    // }

    // public function paymentError(){
    //     $this->view('sponsor/payments/paymentError');
    // }

    // public function paymentDetails(){
    //     $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
    //     $this->view('sponsor/profile/getPaymentDetails',array($res));
    // }

    // public function details($method){
    //     if($method == "update"){
    //         $res = $this->model("payments")
    //             ->updatePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
    //         flashMessage("Successfully Updated!");
    //     }
    //     elseif ($method == "add"){
    //         $res = $this->model("payments")
    //             ->savePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
    //         flashMessage("Successfully Added!");
    //     }
    //     else{
    //         flashMessage("invalid operation");
    //     }
    //     header("location:".BASEURL."sponsor/profile");
    // }

    // public function createBill(){
    //     //        echo "hllo";
    //     $id = getUnique($_SESSION['id']);
    //     $currency = $_POST['currency'];
    //     $amount = $_POST['amount'];
    //     $response = array();
        
    //     if(empty($this->model($this->table1)->checkNotPaidBill($_SESSION['id']))){
    //         if($this->model($this->table1)->addBill($id, $currency, $amount, $_SESSION['id'])){
    //             $response['status'] = 1;
    //             $response['message'] = "Bill created successfully !";
    //             $response['billNo'] = $id;
    //         }else{
    //             $response['status'] = 0;
    //             $response['message'] = "Error in creating the bill !";
    //         }
    //     }else{
    //         $response['status'] = 0;
    //         $response['message'] = "Another unpaid bill already exist !";
    //     }
    //     echo json_encode($response);
    // }

    // public function insertBillData(){
    //     $month = $_POST['month'];
    //     $year = $_POST['year'];
    //     $billNo = $_POST['billNo'];
    //     $student_id = $_POST['student_id'];

    //     $response = array();
    //     $res = $this->model($this->table1)->insertBillRow($student_id,  $year, $month, $billNo);
    //     if($res){
    //         $response['status'] = 1;
    //     }else{
    //         $response['status'] = 0;
    //     }
    //     echo json_encode($response);
    // }

    // public function deleteBillData($bill_id){
    //     if($this->model('sponsorStModel')->deleteBill($bill_id,$_SESSION['id'])){
    //         flashMessage("Deleted");
    //     }else{
    //         flashMessage("Not Deleted");
    //     }
    //     header("location:".BASEURL."sponsor/paymentsInProgress");
    // }

    // public function slips($viewType, $id){
    //     switch ($viewType){
    //         case "payments":
    //             $bill = $this->model($this->table1)->getPayBill($id);
    //             $result =$this->model($this->table1)->getPaymentDetails($id);
    //             $this->view("sponsor/detailedViews/paymentView",array($result,$bill));
    //             break;
    //         case "bills":
    //             $billDetails =$this->model($this->table1)->getBillDetails($id,$_SESSION['id']);
    //             $billContent = $this->model($this->table1)->getBillData($id);
    //             $total = 0;
    //             foreach ($billContent as $one){
    //                 $total += $one->monthlyAmount;
    //             }
    //             $this->view("sponsor/detailedViews/billView",array($billDetails,$billContent,$total));
    //             break;
    //         default:
    //             break;
    //     }
    // }
}

?>



