<?php

class TPremium extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();

       
    }

    
    public function premiumPlan(){
        $this->view('Teacher/Premium/premiumPlan');
    }

    public function savePremium()
    {
        $name = $_POST['card_holder_name'];
        $amount = $_POST['payhere_amount'];
        $email = $_POST['custom_2'];
        $this->model("payments")->savePremium($name, $email, $amount);
    }

    public function premiumForm(){
        $this->view('Teacher/Premium/paymentForm');
    }

    public function getDetails()
    {
        $merchant_id         = $_POST['merchant_id'];
        $userId            = $_POST['order_id'];
        $payhere_amount      = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig              = $_POST['md5sig'];
        $des = $_POST['custom_2'];
        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                $userId .
                $payhere_amount .
                $payhere_currency .
                $status_code .
                strtoupper(md5($_ENV['MERCHANT_SECRET']))
            )
        );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            $res = $this->model("premiumModel")
                ->savePayment($_POST['payment_id'],$userId,$_POST['payhere_currency'],$_POST['payhere_amount'],$des,$_POST['method']);
            $notifyMsg = "You have successfully upgraded to premium. You can enjoy unlimited features for 1 year";
            $this->notify($userId,$notifyMsg,"tch");
        }
    }

    
}

?>