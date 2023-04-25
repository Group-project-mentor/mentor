<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Premium Plan</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php"?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
                    </a>
                    <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Premium Plans</h1>
                    <br><br>

<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">$ 9.99 / year</li>
    <li>10GB Storage</li>
    <li>10 Emails</li>
    <li>10 Domains</li>
    <li>1GB Bandwidth</li>
    <li class="grey"><a href="<?php echo BASEURL ?>TPremium/premiumCheck" class="button" id="payhere-payment">Sign Up</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header" style="background-color:#186537">Pro</li>
    <li class="grey">$ 24.99 / year</li>
    <li>25GB Storage</li>
    <li>25 Emails</li>
    <li>25 Domains</li>
    <li>2GB Bandwidth</li>
    <li class="grey"><a href="<?php echo BASEURL ?>TPremium/premiumCheck" class="button" id="payhere-payment">Sign Up</a></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">$ 49.99 / year</li>
    <li>50GB Storage</li>
    <li>50 Emails</li>
    <li>50 Domains</li>
    <li>5GB Bandwidth</li>
    <li class="grey"><a href="<?php echo BASEURL ?>TPremium/premiumCheck" class="button" id="payhere-payment">Sign Up</a></li>
  </ul>
</div>

</div>



<style>
    * {
      box-sizing: border-box;
    }
    
    .columns {
      float: left;
      width: 33.3%;
      padding: 8px;
    }
    
    .price {
      list-style-type: none;
      border: 1px solid #eee;
      margin: 0;
      padding: 0;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }
    
    .price:hover {
      box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }
    
    .price .header {
      background-color: #111;
      color: white;
      font-size: 25px;
    }
    
    .price li {
      border-bottom: 1px solid #eee;
      padding: 20px;
      text-align: center;
    }
    
    .price .grey {
      background-color: #eee;
      font-size: 20px;
    }
    
    .button {
      background-color: #186537;
      border: none;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
    }
    
    
    </style>


            </section>

            
        </div>  
    </section>      
</body>


<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const TEMP_URL = '<?php echo $_ENV['TEMP_URL'] ?>';
    const MERCHID = '<?php echo $_ENV['MERCHANT_ID'] ?>';

    const amount = 1000;
    let total = amount;
    let count = 1;
    let minus = document.getElementById("minus");
    let plus = document.getElementById("plus");
    let countBox = document.getElementById("countBox");
    let priceDisp = document.getElementById("priceDisp");
    let buyBtn = document.getElementById("buyButton");

    minus.onclick = () => {
        if (count > 1){
            count--;
        }
        countBox.textContent = `${count}`;
        total = amount*count;
        priceDisp.textContent = `Rs. ${total.toFixed(2)}`;
    }

    plus.onclick = () => {
        if (count < 10){
            count++;
        }
        countBox.textContent = `${count}`;
        total = amount*count;
        priceDisp.textContent = `Rs. ${total.toFixed(2)}`;
    }

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    let payment = {
        "sandbox": true,
        "custom_1": `unknown`,
        "merchant_id": MERCHID,
        "return_url": undefined,
        "cancel_url": undefined,
        "notify_url": `${TEMP_URL}/mentor/home/saveBmc`,
        "order_id": 0,
        "items": "",
        "amount": `${total}`,
        "currency": "LKR",
        "hash": "",
        "first_name": "",
        "last_name": "",
        "email": "",
        "phone": "unknown",
        "address": "unknown",
        "city": "unknown",
        "country": "",
        "custom_2":"",
    };

    const getHash = (ordId,amount,currency) => {
        const xhr = new XMLHttpRequest();
        xhr . open('GET', `${BASEURL}payment/hashDetails/${ordId}/${amount}/${currency}`, false);
        xhr . send();
        if (xhr . status === 200) {
            return (xhr.responseText).trim();
        } else {
            return "";
        }
    }

    const setPaymetDetails = () => {
        let formData = new FormData(document.getElementById('paymentForm'));

        payment.items = "Buy Us a Coffee";
        payment.email = formData.get('email');
        payment.country = formData.get('country');
        payment.amount = amount * count;
        payment.custom_1 = count;
        payment.custom_2 = formData.get('email');

        payment.hash = getHash(payment.order_id,payment.amount,payment.currency);

        // console.log(payment);
    }
    // console.log(getHash('o12345',1000,'LKR'))


    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        e.preventDefault();
        setPaymetDetails();
        payhere.startPayment(payment);
    };
</script>
</html>