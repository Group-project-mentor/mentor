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
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/st_auth_style.css">
</head>

<body>
    <section class="login">
        <div class="login-main">
            <div class="login-title">
                <h1>CHANGE <br>PASSWORD</h1>

                <!-- line 23 to 38 had a commented php parts  -->
                <hr />
            </div>
            <form class="login-ctnt" method="POST" action="<?php echo BASEURL ?>forgotPassword/emailExist">
                <div class="login-inp-grp">
                    <label for="email" class="lbl-input form-inp">Email</label><br>
                    <input type="text" class="txt-input" placeholder="Enter your email" id="email" name="email" />
                    <img src="" id="icon1" />
                </div>
                <div class="login-inp-grp">
                    <button type="submit" class="btn-login">Send code</button>
                </div>
            </form>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>
</html>