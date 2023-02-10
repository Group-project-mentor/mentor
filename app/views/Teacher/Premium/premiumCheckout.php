<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Premium checkout</title>
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
                        <a class="back-btn" href="<?php echo BASEURL ?>privateclass/premiumPlan">Back</a>
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
                    <h1>Premium Plan - Checkout</h1>
                    <h6>Teacher Home/ Premium Plan - Checkout</h6>
                    <br><br><br>
                    
                </div>

                
                <div class="checkout-panel">
                    <div class="panel-body">
                      <h2 class="title">Checkout</h2>
                   
                      <div class="progress-bar">
                        <div class="step active"></div>
                        <div class="step active"></div>
                        <div class="step"></div>
                        <div class="step"></div>
                      </div>
                   
                      <div class="payment-method">
                        <label for="card" class="method card">
                          <div class="card-logos">
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/visa.png"/>
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/mastercard.png"/>
                          </div>
                   
                          <div class="radio-input">
                            <input id="card" type="radio" name="payment">
                            Pay £340.00 with credit card
                          </div>
                        </label>
                   
                        <label for="paypal" class="method paypal">
                          <img src="<?php echo BASEURL?>public/assets/Teacher/icons/Pyhere 1.png"/>
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
                              <input type="password" id="verification"/>
                            </div>
                          </div>
                   
                        </div>
                        <div class="column-2">
                          <label for="cardnumber">Card Number</label>
                          <input type="password" id="cardnumber"/>
                   
                          <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
                        </div>
                      </div>
                    </div>
                   
                    <div class="panel-footer">
                    <a href="<?php echo BASEURL ?>TPremium/premiumPlan">
                      <button class="btn back-btn">Change Plan</button>
                    </a>
                      <button class="btn next-btn">Buy Now</button>
                    </div>
                  </div>


<style>
    * {
  box-sizing: border-box;
}
 


.checkout-panel {
  display: flex;
  flex-direction: column;
  width: 940px;
  height: 766px;
  background-color: rgb(255, 255, 255);
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
}

.panel-body {
  padding: 45px 80px 0;
  flex: 1;
}
 
.title {
  font-weight: 700;
  margin-top: 0;
  margin-bottom: 40px;
  color: #2e2e2e;
}

.progress-bar {
  display: flex;
  margin-bottom: 50px;
  justify-content: space-between;
}
 
.step {
  box-sizing: border-box;
  position: relative;
  z-index: 1;
  display: block;
  width: 25px;
  height: 25px;
  margin-bottom: 30px;
  border: 4px solid #fff;
  border-radius: 50%;
  background-color: #efefef;
}
 
.step:after {
  position: absolute;
  z-index: -1;
  top: 5px;
  left: 22px;
  width: 225px;
  height: 6px;
  content: '';
  background-color: #efefef;
}
 
.step:before {
  color: #2e2e2e;
  position: absolute;
  top: 40px;
}
 
.step:last-child:after {
  content: none;
}
 
.step.active {
  background-color: #186537;
}
.step.active:after {
  background-color: #186537;
}
.step.active:before {
  color: #186537;
}
.step.active + .step {
  background-color: #186537;
}
.step.active + .step:before {
  color: #186537;
}
 
.step:nth-child(1):before {
  content: 'Delivery';
}
.step:nth-child(2):before {
  right: -40px;
  content: 'Confirmation';
}
.step:nth-child(3):before {
  right: -30px;
  content: 'Payment';
}
.step:nth-child(4):before {
  right: 0;
  content: 'Finish';
}

.payment-method {
  display: flex;
  margin-bottom: 60px;
  justify-content: space-between;
}
 
.method {
  display: flex;
  flex-direction: column;
  width: 382px;
  height: 122px;
  padding-top: 20px;
  cursor: pointer;
  border: 1px solid transparent;
  border-radius: 2px;
  background-color: rgb(249, 249, 249);
  justify-content: center;
  align-items: center;
}
 
.card-logos {
  display: flex;
  width: 150px;
  justify-content: space-between;
  align-items: center;
}
 
.radio-input {
  margin-top: 20px;
}
 
input[type='radio'] {
  display: inline-block;
}

.input-fields {
  display: flex;
  justify-content: space-between;
}
 
.input-fields label {
  display: block;
  margin-bottom: 10px;
  color: #b4b4b4;
}
 
.info {
  font-size: 12px;
  font-weight: 300;
  display: block;
  margin-top: 50px;
  opacity: .5;
  color: #2e2e2e;
}
 
div[class*='column'] {
  width: 382px;
}
 
input[type='text'],
input[type='password'] {
  font-size: 16px;
  width: 100%;
  height: 50px;
  padding-right: 40px;
  padding-left: 16px;
  color: rgba(46, 46, 46, .8);
  border: 1px solid rgb(225, 225, 225);
  border-radius: 4px;
  outline: none;
}
 
input[type='text']:focus,
input[type='password']:focus {
  border-color: rgb(119, 219, 119);
}
 
#date { background: url(assets/icons/calender.png) no-repeat 95%; }
#cardholder { background: url(assets/icons/holder.png) no-repeat 95%; }
#cardnumber { background: url(assets/icons/creditcard.png) no-repeat 95%; }
#verification { background: url(assets/icons/lock.png) no-repeat 95%; }
 
.small-inputs {
  display: flex;
  margin-top: 20px;
  justify-content: space-between;
}
 
.small-inputs div {
  width: 182px;
}

.panel-footer {
  display: flex;
  width: 100%;
  height: 96px;
  padding: 0 80px;
  background-color: rgb(239, 239, 239);
  justify-content: space-between;
  align-items: center;
}

.btn {
  font-size: 16px;
  width: 163px;
  height: 48px;
  cursor: pointer;
  transition: all .2s ease-in-out;
  letter-spacing: 1px;
  border: none;
  border-radius: 23px;
}
 
.back-btn {
  color: #fff;
  background: #186537;
}
 
.next-btn {
  color: #fff;
  background: #186537;
}
 
.btn:focus {
  outline: none;
}
 
.btn:hover {
  transform: scale(1.1);
}


    </style>
            </section>

 


            
        </div>  
    </section>      
</body>


</html>