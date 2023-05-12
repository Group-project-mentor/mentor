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
            text-align: left;
            padding: 10px 35px 30px 35px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            margin-bottom: 50px;
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
        <?php include_once "components/navbars/st_navbar_7.php" ?> <!-- used to include_once to add file -->

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
                    <?php include_once "components/profilePic.php"?>
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


                <div class="subject-card">
                    <img src="<?php echo BASEURL ?>assets/patterns/4.png" alt="" />
                    <label>Class Name : <?php echo $_SESSION['class_name'] ?></label>
                    <label>Class Feez : <?php echo $_SESSION['fees'] ?>.00 LKR</label>
                </div>
                <div class="token" style="margin: auto; padding-top: 20px;">
                    <div style=" font-family: Arial, sans-serif; color: black;">
                        <h2>How to Join the Class</h2>
                        <ol style="list-style-type: none; margin: 0; padding: 0;">
                            <li style="background-color: #186537; color: white; padding: 10px; margin-bottom: 10px;">
                                <h4>Step 1: Send a Join Request Using the Class Token</h4>
                                <p>To join the class, you first need to obtain the class token and send a join request. Once you have the class token, follow the instructions provided by your teacher to send the request.</p>
                            </li>
                            <li style="background-color: #186537; color: white; padding: 10px; margin-bottom: 10px;">
                                <h4>Step 2: Wait for Teacher Approval</h4>
                                <p>Your join request will be held until your payment is validated. Once your payment is validated, the teacher will accept your token request and you'll be able to attend the class.</p>
                            </li>
                            <li style="background-color: #186537; color: white; padding: 10px; margin-bottom: 10px;">
                                <h4>Step 3: Pay the Monthly Class Fee</h4>
                            </li>
                            <p>To attend the class, you need to pay the monthly class fee. You can use the billing method in your profile to pay the fee. Follow the steps below:</p>
                            <ol style="margin-top: 0; padding-left: 20px;">
                                <li>
                                    <h5>Click the Profile Icon on the Top Right Corner</h5>
                                </li>
                                <li>
                                    <h5>Go to the Billing Section in the Navigation Menu</h5>
                                </li>
                                <li>
                                    <h5>Complete Your Payment</h5>
                                </li>
                            </ol>

                            
                        </ol>
                    </div>
                </div>
                <div style="padding:10px;">
                    <hr>
                </div>

            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>