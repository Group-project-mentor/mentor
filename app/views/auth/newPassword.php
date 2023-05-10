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
            <form action="<?php echo BASEURL ?>forgotPassword/changePassword" class="sign-in-form" method="POST">
                <h2 class="title">CHANGE PASSWORD</h2>
                <div class="input-field">
                    <i class="fa-regular fa-lock"></i>
                    <input type="password" placeholder="New Password" id="passwd" name="passwd" value=""/>
                </div>
                <div class="input-field">
                    <i class="fa-regular fa-lock"></i>
                    <input type="password" placeholder="Confirm new password" id="passwdconf" name="passwdconf" value=""/>
                </div>
                <small style="color: red;text-align:right;display:none;" id="messageBox"></small>

                <button id="submitBtn" class="btn solid" type="submit" name="login"  style="text-align:center ; text-decoration : none ;">Change Password</button>
            <br>
          </form>
    </section>
</body>
<script>
    let password = document.getElementById("passwd");
    let confirm_password = document.getElementById("passwdconf");
    let submitBtn = document.getElementById("submitBtn");
    let messageBox = document.getElementById("messageBox");
    
    submitBtn.disabled = true;

    function validatePassword() {
        if(password.value.length < 8 || confirm_password.value.length < 8) {
            messageBox.style.display = "block";
            messageBox.textContent = "Password must be at least 8 characters long";
            submitBtn.disabled = true;
        } else {
            if (password.value != confirm_password.value) {
                messageBox.style.display = "block";
                messageBox.textContent = "Passwords Don't Match";
                submitBtn.disabled = true;
            } else {
                messageBox.style.display = "none";
                submitBtn.disabled = false;
            }
        }
    }

    password.addEventListener('keyup', validatePassword);
    confirm_password.addEventListener('keyup', validatePassword);

</script>

</html>