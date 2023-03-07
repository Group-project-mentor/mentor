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
<!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/paymentForms.css' ?><!-- ">-->

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
                <h1>Payments Details</h1>
                <h6> Billing / Payments Details</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box" style="margin-top:10px; ">
<!--                <div style="margin-top: 20px;display: flex;justify-content: space-between;">-->
<!--                    <div class="rc-resource-header">-->
<!--                        <h3>Pay your remaining payment :  </h3>-->
<!--                    </div>-->
<!--                    <a href="--><?php //echo BASEURL?><!--sponsor/transactionHistory" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">-->
<!--                        <img src="--><?php //echo BASEURL?><!--public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">-->
<!--                        Transaction History-->
<!--                    </a>-->
<!--                </div>-->
                <div class="rc-upload-box">
                    <form action="" method="POST" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Give Your Payment Details
                        </div>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> First Name* : </label>
                                <input type="text" name="title" placeholder="First Name" value=""/>
                            </div>
                            <div class="rc-form-group">
                                <label> Last Name* : </label>
                                <input type="text" name="lec" placeholder="Last Name" value=""/>
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Payment Email* : </label>
                            <input type="text" name="lec" placeholder="Email" value=""/>
                        </div>
                        <div class="rc-form-group">
                            <label> Telephone* : </label>
                            <input type="text" name="lec" placeholder="Telephone" value=""/>
                        </div>
                        <div class="rc-form-group">
                            <label> Address* : </label>
                            <input type="text" name="lec" placeholder="Address" value=""/>
                        </div>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group" style="flex: 1;">
                                <label> City* : </label>
                                <label>
                                    <select class="pp-quiz-chooser" name="quiz_id">
                                        <option value="LKR">LKR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </label>
                            </div>
                            <div class="rc-form-group" style="flex: 1;">
                                <label> Country* : </label>
                                <label>
                                    <select class="pp-quiz-chooser"  name="quiz_id">
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="India">India</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="rc-upload-button" style="">
                            <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">Pay</button>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</section>
</body>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
    const BASEURL = '<?php echo BASEURL?>';
    const MERCHID = '<?php echo $_ENV['MERCHANT_ID']?>';
    //const MERCHSECR = '<?php //echo $data[1]?>//';

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
    var payment = {
        "sandbox": true,
        "merchant_id": MERCHID,    // Replace your Merchant ID
        "return_url": `${BASEURL}sponsor/paymentDone`,     // Important
        "cancel_url": `${BASEURL}sponsor/paymentError`,     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": "o12345",
        "items": "Door bell wireles",
        "amount": "1000",
        "currency": "LKR",
        "hash": "<?php echo hashDetails('o12345',1000,'LKR')?>",
        "first_name": "Saman",
        "last_name": "Perera",
        "email": "samanp@gmail.com",
        "phone": "0771234567",
        "address": "No.1, Galle Road",
        "city": "Colombo",
        "country": "Sri Lanka",
        "delivery_address": "No. 46, Galle road, Kalutara South",
        "delivery_city": "Kalutara",
        "delivery_country": "Sri Lanka",
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function (e) {
        e.preventDefault();
        payhere.startPayment(payment);
    };
</script>
</html>