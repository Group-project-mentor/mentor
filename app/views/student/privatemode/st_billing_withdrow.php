<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
  <title>Student Withdraw - checkout</title>
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/st_withdrow.css">
</head>

<body>
  <section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


    <div class="content-area">

      <!-- Top bar -->
      <section class="top-bar">

        <div class="top-bar-btns">
          <a href="#">
            <a class="back-btn" href="<?php echo BASEURL ?>st_billing">Back</a>
          </a>
          <a href="#">
            <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
          </a>
          <a href="<?php echo BASEURL?>st_profile">
            <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
          </a>
        </div>
      </section>

      <!-- Middle part for whole content -->
      <section class="mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
          <h1>Checkout</h1>
          <h6>Student Home/ Student withdraw - Checkout</h6>
          <br><br><br>

        </div>


        <div class="checkout-panel">
          <div class="panel-body">
            <h2 class="title">Checkout</h2>

            

            <div class="payment-method">
              <label for="card" class="method card">
                <div class="card-logos">
                  <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/visa.png" />
                  <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/mastercard.png" />
                </div>

                <div class="radio-input">
                  <input id="card" type="radio" name="payment">
                  Pay £340.00 with credit card
                </div>
              </label>

              <label for="paypal" class="method paypal">
                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/Pyhere 1.png" />
                <div class="radio-input">
                  <input id="paypal" type="radio" name="payment">
                  Pay £340.00 with PayHere
                </div>
              </label>
            </div>

            <div class="input-fields">
              <div class="column-1">
                <label for="cardholder">Cardholder's Name</label>
                <input type="text" id="cardholder" />

                <div class="small-inputs">
                  <div>
                    <label for="date">Valid thru</label>
                    <input type="text" id="date" placeholder="MM / YY" />
                  </div>

                  <div>
                    <label for="verification">CVV / CVC *</label>
                    <input type="password" id="verification" />
                  </div>
                </div>

              </div>
              <div class="column-2">
                <label for="cardnumber">Card Number</label>
                <input type="password" id="cardnumber" />

                <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <button class="btn next-btn">Buy Now</button>
          </div>
        </div>
      </section>
    </div>
  </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>