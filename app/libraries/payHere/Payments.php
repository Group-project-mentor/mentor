<?php

    $CheckoutURL = "https://sandbox.payhere.lk/pay/checkout";
    $merchant_id = $_ENV['MERCHANT_ID'];
    function hashDetails($order_id, $amount, $currency, $merchant_secret){
        $hash = strtoupper(
            md5(
                $this->merchant_id .
                $order_id .
                number_format($amount, 2, '.', '') .
                $currency .
                strtoupper(md5($merchant_secret))
            )
        );
    }





