<?php

    function hashDetails($order_id, $amount, $currency): string
    {
        $merchant_id = $_ENV['MERCHANT_ID'];
        $merchant_secret = $_ENV['MERCHANT_SECRET'];
        return strtoupper(
            md5(
                $merchant_id.
                $order_id.
                number_format($amount, 2, '.', '').
                $currency.
                strtoupper(md5($merchant_secret))
            )
        );
    }





