<?php //session_start();
//if (isset($_SESSION["user"])) {
//    header("location:/profile.php");
//}
?>
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
                <!-- <h1>CHANGE<br>PASSWORD</h1> -->

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
            <!-- <form class="login-ctnt" method="POST" action="<?php echo BASEURL ?>forgotPassword/changePassword">
                <div class="login-inp-grp">
                    <label for="passwd" class="lbl-input">New Password</label>
                    <input type="password" class="txt-input" placeholder="New password" id="passwd" name="passwd" />
                </div>
                <br>
                <div class="login-inp-grp">
                    <label for="passwdconf" class="lbl-input">Confirm Password</label>
                    <input type="password" class="txt-input" placeholder="Confirm new password" id="passwdconf" name="passwdconf" />
                </div>
                <br>
                <div class="login-inp-grp">
                    <button type="submit" class="btn-login" name="login">Change Password</button>
                </div>

            </form> -->

            <form action="<?php echo BASEURL ?>forgotPassword/changePassword" class="sign-in-form" method="POST">
                <h2 class="title">CHANGE PASSWORD</h2>
                <div class="input-field">
                    <i class="fa-regular fa-lock"></i>
                    <input type="password" placeholder="New Password" id="passwd" name="passwd"/>
                </div>
                <div class="input-field">
                    <i class="fa-regular fa-lock"></i>
                    <input type="password" placeholder="Confirm new password" id="passwdconf" name="passwdconf"/>
                </div>
                
                <button class="btn solid" type="submit" name="login"  style="text-align:center ; text-decoration : none ;">Send Code</button>
                <!-- <a class="text-decoration:none;" href="<?php echo BASEURL ?>login">
                    <h5 style="color: blue;text-decoration:none;">Back to login</h5>
                </a> -->
            <br>

          </form>
        <!-- </div> -->
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/rc_auth_script.js"></script>

</html>