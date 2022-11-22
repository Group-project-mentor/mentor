<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_auth_style.css">
</head>

<body>
<section class="login">
    <div class="login-main">
        <div class="login-title">
            <h1>CHANGE <br>PASSWORD</h1>

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

            <hr />
        </div>

        <form class="forgot-ctnt" id="otp_area" method="POST" action="<?php echo BASEURL ?>forgotPassword/verifyOTP">
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
                <button type="submit" id="otp-btn" class="btn-login" name="otpForm">SUBMIT</button>
            </div>
        </form>
    </div>
</section>
</body>
<!-- <script src="https://smtpjs.com/v3/smtp.js"></script> -->
<script src="<?php echo BASEURL ?>public/javascripts/otp_script.js"></script>

</html>