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
            <form action="<?php echo BASEURL ?>forgotPassword/emailExist" class="sign-in-form" method="POST">
                <h2 class="title">Forgot Password</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" id="email" name="email"/>
                </div>
                <?php if (isset($_SESSION['message']) and $_SESSION['message'] == 'incorrect_email') {?>
                    <small style="color: red;text-align:right;">Wrong email entered !</small>
                <?php }?>
                <?php if (isset($_SESSION['message']) and $_SESSION['message'] == 'not_registered') {?>
                <small style="color: red;text-align:right;">You are not registered !</small>
                <?php }?>
                <button class="btn solid" type="submit" name="login"  style="text-align:center ; text-decoration : none ;">Send Code</button>
                <a class="text-decoration:none;" href="<?php echo BASEURL ?>login">
                    <h5 style="color: blue;text-decoration:none;">Back to login</h5>
                </a>
            <br>

          </form>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/rc_auth_script.js"></script>
</html>