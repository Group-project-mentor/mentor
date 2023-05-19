<?php

class payment extends Controller
{
    private $merchant_id;
    private $merchent_secret;
    private $return_url = "";
    private $cancel_url = "";
    private $notify_url = "";
    private $CheckoutURL = "https://sandbox.payhere.lk/pay/checkout";

    public function __construct()
    {
        sessionValidator();
        $this->merchant_id = $_ENV['MERCHANT_ID'];
        $this->merchent_secret = $_ENV['MERCHANT_SECRET'];
    }

    public function checkout()
    {
        $data = http_build_query(array(
            "merchant_id" => $this->merchant_id,
            "return_url" => $this->return_url,
            "cancel_url" => $this->cancel_url,
            "notify_url" => $this->notify_url,
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "email" => $_SESSION['email'],
            "phone" => $_POST['phone'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "country" => $_POST['country'],
            "order_id" => $_POST['order_id'],
            "items" => $_POST['items'],
            "amount" => $_POST['amount'],
            "hash" => $this->hashDetails($_POST['order_id'], $_POST['amount'], $_POST['currency'], "payHere"),
            "currency" => $_POST['currency'],
        ));

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                "Content-Length: " . strlen($data) . "\r\n",
                'content' => $data,
            ),
        );

        $context = stream_context_create($options);
        $response = file_get_contents($this->CheckoutURL, false, $context);

        echo $response;
    }

    public function hashDetails($order_id, $amount, $currency)
    {
        echo strtoupper(
            md5(
                $this->merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($this->merchent_secret))
            )
        );
    }

    public function getDetails()
    {
        $merchant_id         = $_POST['merchant_id'];
        $bill_id            = $_POST['order_id'];
        $payhere_amount      = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig              = $_POST['md5sig'];
        $userId = $_POST['custom_1'] ?? 100;
        $des = $_POST['custom_2'] ?? "Funding";
        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                $bill_id .
                $payhere_amount .
                $payhere_currency .
                $status_code .
                strtoupper(md5($_ENV['MERCHANT_SECRET']))
            )
        );

        if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
            $res = $this->model("payments")
                ->savePayment($_POST['payment_id'],$userId,$_POST['payhere_currency'],$_POST['payhere_amount'],$des,$_POST['method'],$bill_id);
            $students = $this->model("payments")->getStudentsofBill($bill_id);
            foreach ($students as $student){
                $notifyMsg = "Sponsor $userId Paid to you for ".$student->year."/".$student->month;
                $this->notify($student->student_id, $notifyMsg,"payment");
            }
            $notifyMsg = "Successfully paid the payment :".$_POST['payhere_amount']." ".$_POST['payhere_currency'];
            $this->notify($userId,$notifyMsg,"payment");
        }
    }

    public function transactionHistory($filter){
            $res = $this->model('payments')->getTrasactionHistory($_SESSION['id']);
    }
}
