<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_auth_style.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/login_style.css">
</head>

<body>
<section class="login">
    <!-- <div class="login-main"> -->
        <!-- <div class="login-title"> -->
            <!-- <h1>CHANGE <br>PASSWORD</h1> -->

            <!--                --><?php // if (isset($_GET["error"])) { ?>
            <!--                    <div class="error"><small>-->
            <!--                            --><?php // echo $_GET["error"]; ?>
            <!--                        </small>-->
            <!--                    </div>-->
            <!---->
            <!--                --><?php //} ?>
            <!---->
            <!--                --><?php // if (isset($_GET["success"])) { ?>
            <!--                    <div class="success">-->
            <!--                        <small>-->
            <!--                            --><?php //echo $_GET["success"]; ?>
            <!--                        </small>-->
            <!--                    </div>-->
            <!---->
            <!--                --><?php // } ?>

            <!-- <hr /> -->
        <!-- </div> -->

        <!-- <form class="forgot-ctnt" id="otp_area" method="POST" action="<?php echo BASEURL ?>forgotPassword/verifyOTP">
            <div class="login-inp-grp">
                <label class="lbl-input otp-label" for="otp">Enter OTP</label><br>
                <input maxlength="6"
                       type="text"
                       class="txt-input otp-box form-inp"
                       placeholder="OTP NO"
                       id="otp"
                       name="otp"
                       pattern="[0-9]{6}"
                       title="OTP is exactly 6 digit number"
                />
                <img src="" id="icon2" />
            </div>
            <div class="login-inp-grp">
                <button type="submit"  class="btn-login" name="otpForm">SUBMIT</button>
            </div>
        </form> -->

        <form action="<?php echo BASEURL ?>forgotPassword/verifyOTP" class="sign-in-form" method="POST">
                <h2 class="title">Enter OTP</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input  placeholder="OTP NO" 
                            id="otp" 
                            pattern="[0-9]{6}"
                            title="OTP is exactly 6 digit number"
                            name="otp"
                            maxlength="6"
                            />
                </div>
                <button id="otp-btn" 
                        class="btn solid" 
                        type="submit" 
                        name="otpForm"  
                        style="text-align:center ; text-decoration : none ;">Send Code</button>
                <!-- <a class="text-decoration:none;" href="<?php echo BASEURL ?>login">
                    <h5 style="color: blue;text-decoration:none;">Back to login</h5>
                </a> -->
            <br>

          </form>
    <!-- </div> -->
</section>
</body>
<!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
<script src="<?php echo BASEURL ?>public/javascripts/otp_script.js"></script>

</html>