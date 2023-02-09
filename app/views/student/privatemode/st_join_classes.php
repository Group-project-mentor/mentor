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
        .join {
            opacity: 1.0;
            padding: 10px;
            margin-left: 200px;
        }

        .join1:hover {
            opacity: 0.5;
        }

        .join2:hover {
            opacity: 0.5;
        }

        .content-area {
            background-image: url('../public/assets/clips/Humaaans2Characters.png');
            background-position: center;
        }

        .join1, .join2 {
            background-color: #186537;;
            border-style: solid;
            border-color: #17ac06;
            border-radius: 15px;
            border-width: 5px;
            float: left;
            width: 250px;
            height: 250px;
            padding: 70px 20px 0px 20px;
            margin: 50px;
            text-align: center;
        }

        .joina {
            text-decoration: none;
            color: white;
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
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <section class="mid-content">
                <!-- join to new class -->
                <div class="top-bar-btns ">
                    <h2>Join to new class</h2>
                </div>

                <div class="join">
                    <br>
                    <div class="join1">
                        <a href="<?php echo BASEURL; ?>st_private_mode/st_join_token" class="joina">
                            <h2>Join with class token</h2>
                            <br>
                            <h4>Get the class token of your teacher and join to the class</h4>
                        </a>
                    </div>

                    <div class="join2">
                        <a href="<?php echo BASEURL; ?>st_private_mode/st_join_request" class="joina">
                            <h2>Join with requests</h2>
                            <br>
                            <h4>Join class by accepting requests</h4>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>