<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments in Progress</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/paymentForms.css' 
                                            ?><!-- ">-->
    <style>
        .answer-correctness-btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            align-self: flex-end;
            margin: 15px 20px;
        }

        .answer-correctness-btn>label {
            margin-left: 5px;
        }

        .answer-correctness-btn>button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(98, 97, 97, 0.071);
            padding: 5px 8px;
            font-size: smaller;
            color: rgb(182, 0, 0);
            border-radius: 7px;
            cursor: pointer;
            border: none;
        }

        #save-info-check {
            accent-color: green;
            margin-left: 25px;
            block-size: 30px;
            inline-size: 15px;
        }


        /* Add styles for the header */
        header {
            background-color: #186537;
            padding: 20px;
        }

        /* Add styles for the horizontal line */
        hr {
            border: 0;
            height: 1px;
            background-color: #186537;
            margin: 0;
        }

        hr {
            border: none;
            height: 5px;
            background-color: #186537;
        }
    </style>
</head>

<body>
    <section class="page">


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
                <hr>
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Payments Details</h1>
                    <h6> Billing / Payments Details</h6>
                </div>
                
                <!-- Grade choosing interface -->
                <div class="container-box" style="margin-top:10px; ">
                    <div class="rc-upload-box">

                        <!--  -->

                        <form action="" method="POST" class="rc-upload-form" id="paymentForm">
                            <div class="rc-form-group-hz">
                                <div class="rc-form-group">
                                    <label> First Name* : </label>
                                    <input type="text" name="fName" placeholder="First Name" value="<?php echo empty($data[0]) ? "" : $data[0]->firstName ?>" />
                                </div>
                                <div class="rc-form-group">
                                    <label> Last Name* : </label>
                                    <input type="text" name="lName" placeholder="Last Name" value="<?php echo empty($data[0]) ? "" : $data[0]->lastName ?>" />
                                </div>
                            </div>

                            <div class="rc-form-group">
                                <label> Payment Email* : </label>
                                <input type="text" name="email" placeholder="Email" value="<?php echo empty($data[0]) ? "" : $data[0]->payEmail ?>" />
                            </div>
                            <div class="rc-form-group">
                                <label> Telephone* : </label>
                                <input type="text" name="telNo" placeholder="Telephone" value="<?php echo empty($data[0]) ? "" : $data[0]->payPhone ?>" />
                            </div>
                            <div class="rc-form-group">
                                <label> Address* : </label>
                                <input type="text" name="address" placeholder="Address" value="<?php echo empty($data[0]) ? "" : $data[0]->address ?>" />
                            </div>
                            <div class="rc-form-group">
                                <label> City* : </label>
                                <input type="text" name="city" placeholder="City" value="<?php echo empty($data[0]) ? "" : $data[0]->city ?>" />
                            </div>
                            <div class="rc-form-group-hz">
                                <div class="rc-form-group" style="flex: 1;">
                                    <label> Country* : </label>
                                    <label>
                                        <select class="pp-quiz-chooser" name="country">
                                            <option value="Sri Lanka" selected>Sri Lanka</option>
                                            <option value="India">India</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="rc-upload-button">
                                <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">Pay</button>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script type="text/javascript" src="<?php echo BASEURL ?>javascripts/middleFunctions.js"></script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const TEMP_URL = '<?php echo $_ENV['TEMP_URL'] ?>';
    const userId = <?php echo $_SESSION['id'] ?>;
    const totalAmount = 12000;
    const MERCHID = '<?php echo $_ENV['MERCHANT_ID'] ?>';
    console.log(totalAmount)
    //const MERCHSECR = '<?php //echo $data[1]
                            ?>//';

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        location.reload()
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
        console.log("Error:" + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": MERCHID,
        "return_url": undefined,
        "cancel_url": undefined,
        "notify_url": `${TEMP_URL}/mentor/TPremium/getDetails`,
        "order_id": `${userId}`,
        "items": "",
        "amount": `${totalAmount}`,
        "currency": "LKR",
        "hash": "",
        "first_name": "",
        "last_name": "",
        "email": "",
        "phone": "",
        "address": "",
        "city": "",
        "country": "",
        "custom_2": "Buy Premium"

    };

    const getHash = (ordId, amount, currency) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `${BASEURL}payment/hashDetails/${userId}/${amount}/${currency}`, false);
        xhr.send();
        if (xhr.status === 200) {
            return (xhr.responseText).trim();
        } else {
            return "";
        }
    }

    const setPaymetDetails = () => {
        let formData = new FormData(document.getElementById('paymentForm'));

        payment.items = "Sudent pay";
        payment.first_name = formData.get('fName');
        payment.last_name = formData.get('lName');
        payment.email = formData.get('email');
        payment.phone = formData.get('telNo');
        payment.address = formData.get('address');
        payment.city = formData.get('city');
        payment.country = formData.get('country');

        payment.hash = getHash(payment.order_id, payment.amount, payment.currency);

        console.log(payment);
    }


    // Show the payhere.js popup, when "PayHere Pay" is clicked
    document.getElementById('payhere-payment').onclick = function(e) {
        e.preventDefault();
        setPaymetDetails();
        payhere.startPayment(payment);
    };
</script>

</html>