<?php

class St_billing extends Controller
{

    private string $user = "st";

    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index()
    {
        $result = $this->model("st_billing_model")->prepareDetailForBill($_SESSION['id'],$_SESSION['class_id']);
        $this->view('student/billing/st_billing', array($result));

    }

    public function prepareDetail()
    {
        $result = $this->model("st_billing_model")->getstudentBillingDEtails($_SESSION['id'],$_SESSION['class_id']);
        
        $this->view('student/billing/st_billing', array($result));
    }

    public function paymentTest(){
        $amount = $this->model("st_billing_model")->getclassAmount($_SESSION['id'],$_SESSION['class_id']);
        $billData = $this->model("st_billing_model")->haspayment_Details($_SESSION['id']);
        $this->view('student/billing/st_payment_Form',array($billData,$amount->fees));
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

    public function getDetails()
    {
        $merchant_id         = $_POST['merchant_id'];
        $classID            = $_POST['order_id'];
        $payhere_amount      = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig              = $_POST['md5sig'];
        $userId = $_POST['custom_1'] ?? 100;
        $des = $_POST['custom_2'] ?? "Funding";
        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                $classID .
                $payhere_amount .
                $payhere_currency .
                $status_code .
                strtoupper(md5($_ENV['MERCHANT_SECRET']))
            )
        );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            $res = $this->model("st_billing_model")
                ->savePayment($_POST['payment_id'],$userId,$_POST['payhere_currency'],$_POST['payhere_amount'],$des,$_POST['method'],$classID);
            $notifyMsg = "Successfully paid the payment :".$_POST['payhere_amount']." ".$_POST['payhere_currency'];
            $this->notify($userId,$notifyMsg,"payment");
        }
    }

    
}

?>



