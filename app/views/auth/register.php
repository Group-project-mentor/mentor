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
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL.'/public/stylesheets/rc_auth_style.css' ?>">
</head>

<body>
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