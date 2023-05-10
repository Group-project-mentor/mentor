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
                <small style="color: red;text-align:right;display:none;" id="messageBox"></small>

                <button id="otp_btn" 
                        class="btn solid" 
                        type="submit" 
                        name="otpForm"  
                        style="text-align:center ; text-decoration : none ;">Send Code</button>
            <br>

          </form>
</section>
</body>
<script>
    const getElement = (id) => document.getElementById(id);

    let otp_btn = getElement("otp_btn");
    let messageBox = getElement("messageBox");
    let otp = getElement("otp");

    let otp_pattern = /[0-9]{6}/;

    otp_btn.disabled = true;

    otp.addEventListener("keyup", () => {
        if (otp_pattern.test(otp.value)) {
            messageBox.style.display = "none";
            otp_btn.disabled = false;
        } else {
            messageBox.style.display = "block";
            otp_btn.disabled = true;
            messageBox.textContent = "Invalid OTP !";
        }
    });
</script>

</html>