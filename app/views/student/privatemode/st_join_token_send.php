<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">

    <style>
        .token {
            border-style: solid;
            border-color: #17ac06;
            border-width: 3px;
            text-align: center;
            padding: 10px 35px 10px 35px;
            width: 600px;
            margin-left: 20%;
        }

        body {
            background-image: url('../public/assets/clips/HumaaansWireframe');
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_token">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <section>
                <div>
                    <br>
                    <h2>Join with class token</h2>
                    <h3>Hello <?php echo $_SESSION['name'] ?> !</h3>
                </div>

                <div style="padding-top: 20px;">
                    <h3 class="token" style="margin: auto;">
                        <div class="subject-card">
                            <img src="<?php echo BASEURL ?>assets/patterns/4.png" alt="" />
                            <label><?php echo $_SESSION['class_name'] ?></label>
                            <label>Class Feez : 3000.00 LKR</label>
                        </div>
                        <hr>
                    </h3>
                </div>
                <div style="padding-top: 40px;">

                    <ul>
                        <li>
                            <h3>Successfully Send the Join Request Using Class Token.</h3>
                        </li>
                        <li>
                            <h3>Next You have to Pay Monthly Amount Of the Class Show Above. You can Use Billing Method In Your Profile.</h3>
                        </li>
                        <li>
                            <h3> Direction For That :</h3>
                        </li>
                        <ol>
                            <li>
                                <h3>Click Profile Icon On Right Top Corner</h3>
                            </li>
                            <li>
                                <h3>Go To Billing Part In Navigation Menu</h3>
                            </li>
                            <li>
                                <h3>Do Payment Through It</h3>
                            </li>
                        </ol>
                        <li>
                            <h3>After Validate Your Payment,Teacher will Accept Token Request.
                                Till that The Process Will Hold And It Will not Take Long Time.</h3>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>