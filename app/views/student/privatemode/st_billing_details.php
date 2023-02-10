<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Billing Details</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/t_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_billing">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Billing</h1>
                    <h6>Student Home/Billing Details</h6>
                    <br><br><br>
                    <h3>Student details</h3>
                    <br><br>

                </div>

                <br><br>

                <div class="class section">
                    <form>
                        <label for="class_name"></label>
                        <input type="text" id="user_name" name="user name" placeholder="Reciver name..">


                    </form>
                </div>

                <div class="class section">
                    <form>
                        <label for="class_name"></label>
                        <input type="text" id="user_id" name="user id" placeholder="Reciver account no..">


                    </form>
                </div>

                <div class="class section">
                    <form>
                        <label for="class_name"></label>
                        <input type="text" id="user_id_relation" name="user id" placeholder="Enter your relationship to them..">

                        <input type="submit" value="Continue">
                    </form>
                </div>

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL; ?>assets/clips/billing.png" alt="lap man">
                </div>
            </section>



        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>