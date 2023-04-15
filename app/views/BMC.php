<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy me a coffee</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/landing/landing.css" />
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/bmc.css" />
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
</head>
<body>

<?php
if (!empty($_SESSION['message']) && $_SESSION['message'] == "Success") {
    include_once "components/alerts/bmcThankYou.php";
}
?>

<section class="landing-hero-section landing-hero-resp-1">
    <a class="back-pop-btn" href="<?php echo  BASEURL?>landing">
        < Back
    </a>
    <div>
        <div class="landing-hero-left">
            <h1 class="landing-hero-title">
                BUY US A COFFEE ...
            </h1>
            <h2 class="landing-hero-title">
                Buying us a coffee is a small gesture, but it means a lot to us. It helps us stay motivated and inspired to keep creating new content and improving our website.
            </h2>
            <img src="<?php echo BASEURL ?>assets/clips/working.gif" alt="">
            <h2 class="landing-hero-title">
                Thank you so much for your support, and we hope you enjoy our content!
            </h2>

        </div>

        <div class="landing-hero-right">
            <div class="price-box">
                <div style="flex-direction: column;">
                    <h1 style="color: #ffffff;">COST  PER  1</h1>
                    <h2 style="color: #ffffff;">Rs: 1,000.00 </h2>
                </div>

                <img src="<?php echo BASEURL ?>assets/clips/coffee_cup.png" alt="">
                <div class="price-btns">
                    <button id="minus">-</button>
                    <div id="countBox">1</div>
                    <button id="plus">+</button>
                </div>
                <div>
                    <h2 style="color: whitesmoke;" id="priceDisp">Rs.1000.00</h2>
                </div>
            <form action="" id="paymentForm" class="rc-upload-form">
                <div class="rc-form-group-hz">
                    <div class="rc-form-group">
                        <input type="text" name="email" placeholder="Email*" />
                    </div>
                </div>
                <div class="rc-form-group-hz">
                    <div class="rc-form-group">
                        <input type="text" name="country" placeholder="country" />
                    </div>
                </div>
                <button type="button" id="payhere-payment" class="landing-btn">
                    Buy
                </button>
            </form>
            </div>
        </div>

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
