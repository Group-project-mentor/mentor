<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <?php
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/video_alerts/video_update_success.php";
        }
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

                <!--  -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>VIDEOS</h1>
<!--                        <a href="--><?php //echo BASEURL . 'rcAdd/video' ?><!--">-->
<!--                            <div class="rc-add-btn">-->
<!--                                Add Video-->
<!--                            </div>-->
<!--                        </a>-->
                        <div class="rc-add-btn" id="video-add-button" style="align-items: center;">
                            Add Video
                            <img src="<?php echo BASEURL?>assets/icons/icon_down_white.png" alt="profile" class="rc-resource-button-icon-s">
                        </div>
                        <div class="rc-popup-menu popup-toggle" id="popup-menu">
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'rcAdd/videoUpload' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_upload_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Upload Video
                                </div>
                            </a>
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'rcAdd/video' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_youtube_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Youtube Link
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="rc-video-card-set">
                        <?php
                            if(!empty($data[0])){
                                $count = 1;
                                foreach ($data[0] as $row) {
                                    $approval = $this->approvedGenerator($row->approved);
                                    ?>
                                    <div class='rc-video-card' style="align-items: center;">
                                        <img alt='' src="<?php echo BASEURL."assets/patterns/".$count++.'.png'?>"  />
                                        <a href='<?php echo BASEURL."rcResources/preview/video/".$row->id ?>' >
                                            <label><?php echo $row->name ?></label>
                                        </a>
                                        <a href='<?php echo BASEURL."rcResources/preview/video/".$row->id ?>' style="background: rgb(24, 100, 55);cursor: pointer;">
                                            <label style="color: white;">View</label>
                                            <img style="width: 15px" src='<?php echo BASEURL?>assets/icons/icon_eye_white.png' alt='' />
                                        </a>
                                        <div style="position: absolute;left: 15px;top: 15px;">
                                            <img src='<?php echo BASEURL."assets/icons/".$approval ?>' alt='' class="resource-approved-sign">
                                        </div>
                                    </div>
                           <?php     }
                            }
                            else{ ?>
                                <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php  } ?>

                    </div>
                </div>
                <?php if(count($data[0]) > 25){ ?>
                <div class="pagination-set">
                    <div class="pagination-set-left">
                        <b>25</b> Results
                    </div>
                    <div class="pagination-set-right">
                        <button> < </button>
                        <div class="pagination-numbers">
                            1 of 10
                        </div>
                        <button> > </button>
                    </div>
                </div>
                <?php } ?>
        </div>


    </section>
</body>
<script>
    document.getElementById('video-add-button').addEventListener('click',()=>{
        document.getElementById('popup-menu').classList.toggle('popup-toggle');
    });
</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>