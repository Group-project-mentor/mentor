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
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_auth_style.css">
</head>

<body>
    <section class="login">
        <div class="login-main">
            <div class="login-title">
                <h1>LOGIN</h1>

                <?php if (isset($_GET["error"])) {?>
                    <div class="error"><small>
                            <?php echo $_GET["error"]; ?>
                        </small></div>

                <?php }?>

                <?php if (isset($_GET["success"])) {?>
                    <div class="success"><small>
                            <?php echo $_GET["success"]; ?>
                        </small></div>

                <?php }?>

                <hr />
            </div>
            <form class="login-ctnt" method="POST" action="login/verify_login">

                <div class="login-inp-grp">
                    <label for="email" class="lbl-input">Email</label>
                    <input type="text" class="txt-input" placeholder="Enter your email" id="email" name="email" />
                    <img src="<?php echo BASEURL; ?>public/assets/icons/verified.png" alt="verified" id="icon1">
                </div>

                <div class="login-inp-grp">
                    <label for="password" class="lbl-input">Password</label>
                    <input type="password" class="txt-input" placeholder="Enter your password" id="passwd" name="passwd" />
                    <a href="forgotPassword.php" class="login-fgt">Forgot your password?</a>
                </div>

                <div class="login-inp-grp">
                    <button type="submit" class="btn-login" name="login">Login</button>
                    <a href="register" class="login-fgt">Not registered yet? Register</a>
                </div>

            </form>
        </div>
    </section>
    <script src="<?php echo BASEURL ?>public/javascripts/rc_auth_script.js"></script>
</body>

</html>