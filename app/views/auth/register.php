<?php session_start();
if (isset($_SESSION["user"])) {
    header("location:/profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>register</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/landing/landing.css">
    <link rel="stylesheet" href="<?php echo BASEURL.'/public/stylesheets/rc_auth_style.css' ?>">
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
    <section class="register">
        <div class="register-main">
            <div class="login-title">
                <h1>REGISTER</h1>
                <?php if (isset($_GET["error"])) { ?>

                    <div class="error"><small>
                            <?php echo $_GET["error"]; ?>
                        </small></div>

                <?php } ?>
                <hr />
            </div>
            <form class="login-ctnt" method="POST" action="register/verify_register">
                <div class="login-inp-grp">
                    <label for="name" class="lbl-input">Name</label>
                    <input type="text" class="txt-input" placeholder="Enter your name" id="name" name="name" />
                </div>
                <div class="login-inp-grp">
                    <label for="email" class="lbl-input">Email</label>
                    <input type="text" class="txt-input" placeholder="Enter your email" id="email" name="email" />
                    <img src="../assets/verified.png" alt="verified" id="icon">
                </div>
                <div class="login-inp-grp">
                    <label for="password" class="lbl-input">Password</label>
                    <input type="password" class="txt-input" placeholder="Enter your password" id="passwd" name="passwd" />
                </div>
                <div class="login-inp-grp">
                    <label for="password confirmation" class="lbl-input">Confirm Password</label>
                    <input type="password" class="txt-input" placeholder="Confirm your password" id="passwd_conf" name="cpasswd" />
                </div>
                <div class="login-inp-grp">
                    <button type="submit" class="btn-login" name="register">Register</button>
                    <a href="login" class="login-fgt">Already registered? sign in</a>
                </div>
            </form>
        </div>
    </section>
    <script src="<?php echo BASEURL.'/public/javascripts/script.js'?>"></script>
</body>

</html>