<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Billing</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="#">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Billing</h1>
                    <h6>Teacher Home/ Members details/change host</h6>
                    <br><br><br>
                    <h3>Available Balance in your wallet</h3>
                    <br><br>

                </div>

                <div style="display: flex;justify-content: center;font-size:30px">
                    <h1>Rs.*******</h1>
                </div>
                <br><br>
                <div style="display: flex; justify-content:space-around; align-items: center;">
                    <a href="<?php echo BASEURL; ?>st_billing/st_billing_history">
                        <button style="background-color: green; border:green; color: white; border-radius: 30px; padding: 10px 65px;">See transaction history</button>
                    </a>
                    <a href="<?php echo BASEURL; ?>st_billing/st_billing_withdrow">
                        <button style="background-color: green; border:green; color: white; border-radius: 30px; padding: 10px 65px;">Withdraw money</button>
                    </a>
                </div>

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="assets/clips/billing.png" alt="lap man">
                </div>
            </section>



        </div>
    </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>