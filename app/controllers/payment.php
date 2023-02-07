<?php

class payment extends Controller
{
    private $merchant_id;
    private  $return_url = "";
    private  $cancel_url = "";
    private  $notify_url = "";
    private $CheckoutURL = "https://sandbox.payhere.lk/pay/checkout";

    public function __construct()
    {
        session_start();
        $this->merchant_id = $_ENV['MERCHANT_ID'];
    }

    public function checkout(){
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
            "hash" => $this->hashDetails($_POST['order_id'], $_POST['amount'], $_POST['currency'], "payHere" ),
            "currency" => $_POST['currency'],
        ));

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
                    "Content-Length: " . strlen($data) . "\r\n",
                'content' => $data
            )
        );

        $context = stream_context_create($options);
        $response = file_get_contents($this->CheckoutURL , false, $context);

        echo $response;
    }
    private function hashDetails($order_id, $amount, $currency, $merchant_secret){
        return strtoupper(
            md5(
                $this->merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )

        );
    }
}