<?php

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); 
define('DB_NAME', 'mentor');
define('DB_PASSWORD', '');
define("BASEURL", "http://localhost/mentor/");
const paginationRowLimit = 10;
const CheckoutURL = "https://sandbox.payhere.lk/pay/checkout";


$env = parse_ini_file('.env');
$_ENV = array_merge($_ENV, $env);


$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/mentor";
define("PATH", "$path");

?>

