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

    public function paymentTest(){
        $this->view('sponsor/payments/paymentForm');
    }

//    public function checkoutPayment(){
//        $return_url = "http://sample.com/return";
//        $cancel_url = "http://sample.com/cancel";
//        $notify_url = "http://sample.com/notify";
//
//        $hash = hashDetails($_POST['order_id'], $_POST['amount'], $_POST['currency']);
//
//        $data = array(
//            'merchant_id' => $_ENV['MERCHANT_ID'],
//            'return_url' => $return_url,
//            'cancel_url' => $cancel_url,
//            'notify_url' => $notify_url,
//            'first_name' => $_POST['first_name'],
//            'last_name' => $_POST['last_name'],
//            'email' => $_POST['email'],
//            'phone' => $_POST['phone'],
//            'address' => $_POST['address'],
//            'city' => $_POST['city'],
//            'country' => "Sri Lanka",
//            'order_id' => $_POST['order_id'],
//            'items' => $_POST['items'],
//            'currency' => $_POST['currency'],
//            'amount' => $_POST['amount'],
//            'hash' => $hash
//        );
//
//        // Initialize curl
//        $curl = curl_init();
//
//        // Set the options for the POST request
//        curl_setopt($curl, CURLOPT_URL, CheckoutURL);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($curl, CURLOPT_POSTREDIR, CURL_REDIR_POST_ALL);
//
//        header('Location: ' . curl_exec($curl));
//
//        curl_close($curl);
//    }

    public function paymentDone(){
        $this->view('sponsor/payments/paymentDone');
    }

    public function paymentError(){
        $this->view('sponsor/payments/paymentError');
    }
}