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

<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php" ?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
                <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                    <div class="back-btn">Back</div>
                </a>
            <div class="top-bar-btns">
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / settings</h6>
            </div>

            <!--  -->
            <div class="container-box">

            </div>
    </div>


</section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>