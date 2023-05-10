<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
    <style>
        body {
            background-image: url('../public/assets/clips/HyperspaceMaintenanceDay');
            background-position: center;
            background-size: cover;
        }

        .rc-pp-row {
            display: flex;
            flex-wrap: wrap;
        }

        .subject-card {
            width: 50%;
            float: left;
        }
    </style>

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
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
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
                    <h2>Join with requests</h2>
                    <h4>Join class by accepting requests. <br><br><br></h4>
                </div>
            </section>
            <section>
                <?php if (!empty($data[0])) { ?>
                    <div class="rc-resource-table">

                        <?php foreach ($data[0] as $row) { ?>
                            <div class="rc-pp-row">

                                <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                                <div class="rc-resource-col"><?php echo $row->class_name ?></div>
                                <div class="rc-resource-col"></div>
                                <div class="rc-quiz-row-btns">
                                    <div class="sponsor-list-item flex-1" style="display:flex;align-items:center;justify-content:space-evenly;">
                                        <a href="<?php echo BASEURL . 'st_private_mode/st_join_request_update/1/' . $row->class_id   ?>">
                                            <div class="back-btn">Accept</div>
                                        </a>
                                        <a href="<?php echo BASEURL . 'st_private_mode/st_join_request_update/0/' . $row->class_id ?>">
                                            <div class="back-btn">Delete</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <?php } else { ?>
                    <h2 style="color:green;">No Class Requests yet !</h2>
                <?php } ?>


        </div>
    </section>
    </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>