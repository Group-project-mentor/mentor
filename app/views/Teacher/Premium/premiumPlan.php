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
          <?php include_once "components/notificationIcon.php" ?>
          <?php include_once "components/premiumIcon.php" ?>
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
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/demand.gif" alt="notify">
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
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/graph.gif" alt="notify">
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
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/customer.gif" alt="notify">
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
              <h1><br>You only have to pay RS.10 000 for a Year.</h1>
            </div><br><br>
            <div class="button-container">

              <a href='<?php echo BASEURL ?>TPremium/premiumForm' style='background-color: #186537; color: #fff; padding: 10px 20px; border-radius: 5px; text-decoration: none;'>
                Buy
              </a>


            </div>

          </section>
        </body>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script>
          const BASEURL = '<?php echo BASEURL ?>';
          const TEMP_URL = '<?php echo $_ENV['TEMP_URL'] ?>';
          const MERCHID = '<?php echo $_ENV['MERCHANT_ID'] ?>';

          const amount = 10000;
          let total = amount;
          let buyBtn = document.getElementById("buy");


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
            "merchant_id": 1223117,
            "return_url": undefined,
            "cancel_url": undefined,
            "notify_url": `${TEMP_URL}/mentor/TPremium/savePremium`,
            "order_id": 0,
            "items": "",
            "amount": `${total}`,
            "currency": "LKR",
            "hash": "",
            "first_name": "",
            "last_name": "",
            "email": "unknown",
            "phone": "unknown",
            "address": "unknown",
            "city": "unknown",
            "country": "unknown",
            "custom_2": "unknown",
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

            payment.items = "Buy premium";
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



      </section>


    </div>
  </section>
</body>

</html>