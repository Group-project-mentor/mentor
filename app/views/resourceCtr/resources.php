<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:" . BASEURL . "login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_btn_list.css' ?>">
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <a href="#">
                    <div class="back-btn">Back</div>
                </a>
                <div class="top-bar-btns">
                    
                    <a href="#">
                        <img src="assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C79 - Science</h1>
                    <h6>My Subjects / C79</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-two-col-container">
                        <div class="decorator">
                            <img src="<?php echo BASEURL?>assets/clips/resource_girl.png" alt="resource_girl">
                        </div>
                        <div class="rc-resources">
                            <h1>ADD RESOURCES</h1>
                            <h3>choose source type</h3>
                            <div class="rc-resource-list">
                                <a href="<?php echo BASEURL.'resources/video/'?>">
                                    <div class="rc-resource-list-item">
                                        <img class="rc-icon" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="video">
                                        <p>Video</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="rc-resource-list-item">
                                        <img class="rc-icon" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="video">
                                        <p>Video</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="rc-resource-list-item">
                                        <img class="rc-icon" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="video">
                                        <p>Video</p>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="rc-resource-list-item">
                                        <img class="rc-icon" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="video">
                                        <p>Video</p>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                </div>

        </div>

    </section>
</body>

</html>