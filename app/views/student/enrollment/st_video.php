<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_courses">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Subjects</h1>
                    <h6>Hello </h6>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <div>
                        <h2>Grade 9 - C79 - Science</h2>
                    </div>
                    <div class="subject-card-set">
                        <div class="rc-video-card-set">
                            <?php
                            // var_dump($data[0]);
                            if (!empty($data[0])) {
                                $count = 1;
                                foreach ($data[0] as $row) {
                                    echo "<div class='rc-video-card'>
                                            <img src='" . BASEURL . "assets/patterns/" . $count++ . ".png' alt='' />
                                            <a href='" . BASEURL . "rcResources/preview/video/" . $row['id'] . "'>
                                                <label>" . $row['name'] . "</label>
                                            </a>
                                            <!-- <div class='rc-video-card-btns'>
                                                <button class='rc-video-delete-btn' onclick='delConfirm(" . $row['id'] . ",1)'>
                                                    <img src='" . BASEURL . "assets/icons/icon_delete.png' alt=''>
                                                </button>
                                                <a class='rc-video-delete-btn' href='" . BASEURL . "rcEdit/video/" . $row['id'] . "'>
                                                    <img src='" . BASEURL . "assets/icons/icon_edit.png' alt=''>
                                                </a>
                                            </div> -->
                                        </div>";
                                }
                            } else {
                                echo "No data";
                            }
                            ?>

                        </div>

                        <!-- default -->
                        <div class="subject-card">
                            <img src="<?php echo BASEURL ?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C79 - lesson 1</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn"><a href="<?php echo BASEURL ?>st_video_play" style="color:white ;">Play</a></button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C79 - lesson 2</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn"><a href="<?php echo BASEURL ?>st_video_play" style="color:white ;">Play</a></button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL ?>assets/patterns/4.png" alt="" />
                            <a href="#"><label>C79 - lesson 3</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn"><a href="<?php echo BASEURL ?>st_video_play" style="color:white ;">Play</a></button>
                        </div>


                    </div>
                </div>
        </div>
    </section>
    </div>
    </section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>