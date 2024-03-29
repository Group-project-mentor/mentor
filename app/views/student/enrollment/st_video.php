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
                    
                </div>
                <div class="top-bar-btns">
                <a href="<?php echo BASEURL . 'st_public_resources/index/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <?php
                    $ggid = $_SESSION['gid'] + 5;
 ?>
                    <h1><?php echo "Grade " . $ggid . " - " . ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / Videos</h6>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    
                    <div class="subject-card-set">
                            <?php
                            // var_dump($data[0]);
                            if (!empty($data[0])) {
                                $count = 1;
                                foreach ($data[0] as $row) { ?>
                                    <div class='subject-card' style="align-items: center;">
                                        <img src='<?php echo BASEURL . "assets/patterns/" . $count++ .'.png'?>' alt='' />
                                        <label><?php echo $row->name ?></label>
                                        <a href='<?php echo BASEURL."st_public_resources/preview/video/".$row->id ?>'  >
                                            <label>Play</label>
                                            <!-- <img style="width: 25px" src='<?php echo BASEURL?>assets/icons/icon_eye_white.png' alt='' /> -->
                                        </a>
                                    </div>
                             <?php   }
                            } else {
                                echo "No data";
                            }
                            ?>
                    </div>
                </div>
        </div>
    </section>
    </div>
    </section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>