<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Report issue</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/t_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>st_report_main">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Report Issues</h1>
                    <h6>Student Home/ Report Issues</h6>
                    <br><br><br>
                    <h3>White down your complaint under the Chosen category :</h3>
                    <br>
                </div>

                <div class="class section">
                    <form>
                        <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                        <br><br>
                        <a href="<?php echo BASEURL ?>#">
                            <div style="width:100px" class="back-btn">Submit</div>
                        </a>
                    </form>
                </div>

            </section>

        </div>
    </section>
</body>


<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>