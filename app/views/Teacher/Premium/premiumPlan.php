<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Premium Plan</title>
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/premium.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
  <section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/t_nav_1.php" ?>

    <div class="content-area">

      <!-- Top bar -->
      <section class="top-bar">

        <div class="top-bar-btns">
          <a href="#">
            <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
          </a>
          <a href="#">
            <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
          </a>
          <a href="<?php echo  BASEURL ?>TProfile/profile">
            <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
          </a>
        </div>
      </section>

      <!-- Middle part for whole content -->
      <section class="mid-content">

        <body>
          <section>
            <div class="container">
              <div class="card">
                <div class="content">
                  <div class="imgBx">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/customer.gif" alt="notify">
                  </div>
                  <div class="contentBx">
                    <h3>No limit for adding Students<br></h3>
                  </div>
                </div>
                <ul class="sci">
                  <li>
                  <li>
                    (Free version only allows add up to 20 students)
                  </li>
                  </li>
                </ul>
              </div>
              <div class="card">
                <div class="content">
                  <div class="imgBx">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/connection.gif" alt="notify">
                  </div>
                  <div class="contentBx">
                    <h3>No limit for creating classes<br></h3>
                  </div>
                </div>
                <ul class="sci">
                  <li>
                  <li>
                    (Free version only allows create up to 5 classes)
                  </li>
                  </li>
                </ul>
              </div>
              <div class="card">
                <div class="content">
                  <div class="imgBx">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/tconnect.gif" alt="notify">
                  </div>
                  <div class="contentBx">
                    <h3>No limit for adding Teachers <br></h3>
                  </div>
                </div>
                <ul class="sci">
                  <li>
                  <li>
                    (Free version only allows add up to 2 teachers)
                  </li>
                  </li>
                </ul>
              </div>
            </div>
            <div class="amount">
              You only have to pay ***$ for Month.
            </div><br><br>
            <div class="button-container" id="payhere-payment">
              <button class="buy-button">Buy</button>
            </div>

          </section>
        </body>




      </section>


    </div>
  </section>
</body>


<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script>
  const BASEURL = '<?php echo BASEURL ?>';
  const TEMP_URL = '<?php echo $_ENV['TEMP_URL'] ?>';
  const MERCHID = '<?php echo $_ENV['MERCHANT_ID'] ?>';


  let buyBtn = document.getElementById("buyButton");


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
    console.log("Error:" + error);
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
    "custom_2": "",
  };

  const getHash = (ordId, amount, currency) => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `${BASEURL}payment/hashDetails/${ordId}/${amount}/${currency}`, false);
    xhr.send();
    if (xhr.status === 200) {
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

    payment.hash = getHash(payment.order_id, payment.amount, payment.currency);

    // console.log(payment);
  }
  // console.log(getHash('o12345',1000,'LKR'))


  // Show the payhere.js popup, when "PayHere Pay" is clicked
  document.getElementById('payhere-payment').onclick = function(e) {
    e.preventDefault();
    setPaymetDetails();
    payhere.startPayment(payment);
  };
</script>

</html>