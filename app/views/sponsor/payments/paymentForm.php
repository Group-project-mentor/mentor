<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments in Progress</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <style>
        /* Body styles */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        /* Form styles */
        form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        /* Label styles */
        label {
            display: block;
            margin-bottom: 10px;
        }

        /* Input styles */
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Error message styles */
        .error-message {
            color: red;
            margin-top: 10px;
        }

    </style>
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
                <!--                <a href="#">-->
                <!--                    <a class="back-btn" href="--><?php //echo BASEURL ?><!--privateclass/billing">Back</a>-->
                <!--                </a>-->
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Payments in Progress</h1>
                <h6> Billing / Payments in progress</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div style="margin-top: 20px;display: flex;justify-content: space-between;">
                    <div class="rc-resource-header">
                        <h3>Pay your remaining payment :  </h3>
                    </div>
                    <a href="<?php echo BASEURL?>sponsor/transactionHistory" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Transaction History
                    </a>
                </div>
                <div style="margin-top: 30px;">
                    <form method="post" action="<?php echo CheckoutURL ?>">
                        <input type="hidden" name="merchant_id" value="<?php echo $_ENV['MERCHANT_ID']?>">    <!-- Replace your Merchant ID -->
                        <input type="hidden" name="return_url" value="<?php echo BASEURL.'sponsor/paymentDone'?>">
                        <input type="hidden" name="cancel_url" value="<?php echo BASEURL.'sponsor/paymentDone'?>">
                        <input type="hidden" name="notify_url" value="http://sample.com/notify">
                        </br></br>Item Details</br>
                        <input type="text" name="order_id" value="o12345">
                        <input type="text" name="items" value="Door bell wireless">
                        <input type="text" name="currency" value="LKR">
                        <input type="text" name="amount" value="1000">
                        </br></br>Customer Details</br>
                        <input type="text" name="first_name" value="Saman">
                        <input type="text" name="last_name" value="Perera">
                        <input type="text" name="email" value="samanp@gmail.com">
                        <input type="text" name="phone" value="0771234567">
                        <input type="text" name="address" value="No.1, Galle Road">
                        <input type="text" name="city" value="Colombo">
                        <input type="hidden" name="country" value="Sri Lanka">
                        <input type="hidden" name="hash" value="<?php echo hashDetails('o12345',1000,'LKR')?>">
                        <!-- Replace with generated hash -->
                        <button type="submit" >OK</button>
                    </form>
                </div>
            </div>
    </div>
</section>
</body>
<script>
    const paymentForm = document.getElementById('paymentForm');
    const checkoutURL = '<?php echo CheckoutURL ?>';

    paymentForm.onsubmit = (e) => {
        e.preventDefault();

        let formData = new FormData(paymentForm);

    }




</script>
</html>