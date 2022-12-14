<?php session_start();
if (isset($_SESSION["user"])) {
    header("location:" . BASEURL . "home");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/landing/landing.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_auth_style.css">
</head>

<body>
     <!-- nav bar -->
        <nav class="landing-nav-main">
            <a class="landing-nav-logo" href="<?php echo BASEURL ?>">
                <img src="<?php echo BASEURL ?>assets/landing/logo1.png" alt="">
            </a>
            <div class="three-bars" id="toggler">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="landing-nav-links nav-hidden" id="nav-links">
                <a class="landing-nav-link" href="<?php echo BASEURL ?>#Home">Home</a>
                <a class="landing-nav-link">About</a>
                <a class="landing-nav-link" href="<?php echo BASEURL ?>#BMC">Buy me a coffee</a>
                <a class="landing-nav-link" href="<?php echo BASEURL ?>#footer">Contact us</a>
                <a class="landing-nav-link landing-special-btn" href="<?php echo BASEURL ?>login">Login</a>
            </div>
        </nav>
    <section class="login">
        <div class="login-main">
            <div class="login-title">
                <h1>LOGIN</h1>

                <?php if ($data == 1) {?>
                    <div class="error">
                        <small>
                            <?php echo "Incorrect Password !"; ?>
                        </small>
                    </div>
                <?php }?>

                <?php if ($data == 2) {?>
                    <div class="error">
                        <small>
                            <?php echo "You are not registered !"; ?>
                        </small>
                    </div>
                <?php }?>

                    <?php if ($data == 3) {?>
                        <div class="error">
                            <small>
                                <?php echo "Invalid Email !"; ?>
                            </small>
                        </div>
                    <?php }?>
                    <hr/>

                </div>
                <form class="login-ctnt" method="POST" action="login/verify_login">

                <div >

                    <div class="login-inp-grp">
                        <label for="email" class="lbl-input">Email</label>
                        <input type="text" class="txt-input" placeholder="Enter your email" id="email" name="email" />
                        <img src="<?php echo BASEURL; ?>assets/icons/verified.png" alt="verified" id="icon1">
                    </div>

                    <div class="login-inp-grp">
                        <label for="password" class="lbl-input">Password</label>
                        <input type="password" class="txt-input" placeholder="Enter your password" id="passwd" name="passwd" />
                        <a href="<?php echo BASEURL; ?>forgotPassword" class="login-fgt">Forgot your password?</a>
                    </div>
                    <br>
                    <div style="">
                        <img src="<?php echo BASEURL; ?>public/assets/clips/add_student.png" alt="image" width="300"  height="250">
                    </div>
                    <br>
                    <div class="login-inp-grp">
                        <button type="submit" class="btn-login" name="login" >Login</button>
                        <a href="<?php echo BASEURL; ?>register" class="login-fgt">Not registered yet? Register</a>
                    </div>
                    <div style="">
                        <img src="<?php echo BASEURL; ?>assets/grades/logo1.png" alt="image" width="300"  height="80">
                    </div>

                </form>
            </div>

    </section>
    <script src="<?php echo BASEURL ?>public/javascripts/rc_auth_script.js"></script>
</body>

</html>