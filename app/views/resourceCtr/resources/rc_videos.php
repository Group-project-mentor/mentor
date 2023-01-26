<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <?php 
        if($data[1] == "success"){
            include_once "components/alerts/video_alerts/video_update_success.php"; 
        }
    ?>

    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_2.php" ?>
        
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="<?php echo BASEURL?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / videos</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>VIDEOS</h1>
                        <a href="<?php echo BASEURL . 'rcAdd/video' ?>">
                            <div class="rc-add-btn">
                                Add Video
                            </div>
                        </a>
                    </div>
                    <div class="rc-video-card-set">
                        <?php
                            if(!empty($data[0])){
                                foreach ($data[0] as $row) {
                                    echo "<div class='rc-video-card'>
                                            <img src='".BASEURL."assets/patterns/1.png' alt='' />
                                            <a href='".BASEURL."rcResources/preview/video/".$row['id']."'>
                                                <label>".$row['name']."</label>
                                            </a>
                                            <!-- <div class='rc-video-card-btns'>
                                                <button class='rc-video-delete-btn' onclick='delConfirm(".$row['id'].",1)'>
                                                    <img src='".BASEURL."assets/icons/icon_delete.png' alt=''>
                                                </button>
                                                <a class='rc-video-delete-btn' href='".BASEURL."rcEdit/video/".$row['id']."'>
                                                    <img src='".BASEURL."assets/icons/icon_edit.png' alt=''>
                                                </a>
                                            </div> -->
                                        </div>";
                                }
                            }
                            else{
                                echo "No data";
                            }
                        ?> 

                    </div>
                </div>

        </div>

    </section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>