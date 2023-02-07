<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("location:" . BASEURL . "login");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Student</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php" ?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Student Program</h1>
                <h2>Find Student</h2>
            </div>

            <!-- bottom part -->
            <section class="bottom-section-grades" style="flex-direction: column;align-items:center;">
                <div class="sponsor-search-comp">
<!--                    <h3>-->
<!--                        Find Student :-->
<!--                    </h3>-->
                    <div class="search-bar">
                        <input type="text" name="" id="" placeholder="Search Student...">
                        <a href="">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="sponsor-list-main row-decoration">
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">
                            ID
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-2">
                            Image
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-5">
                            Name
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-3">
                            Fund
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">

                        </div>
                    </div>

                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item flex-1">
                            2000
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                        </div>
                        <div class="sponsor-list-item flex-5">
                            D.K.S.Siriwardhana
                        </div>
                        <div class="sponsor-list-item flex-3">
                            Rs.2000.00
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <div class="sponsor-list-img-btns">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item flex-1">
                            2000
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                        </div>
                        <div class="sponsor-list-item flex-5">
                            D.K.S.Siriwardhana
                        </div>
                        <div class="sponsor-list-item flex-3">
                            Rs.2000.00
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <div class="sponsor-list-img-btns">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item flex-1">
                            2000
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                        </div>
                        <div class="sponsor-list-item flex-5">
                            D.K.S.Siriwardhana
                        </div>
                        <div class="sponsor-list-item flex-3">
                            Rs.2000.00
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <div class="sponsor-list-img-btns">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item flex-1">
                            2000
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                        </div>
                        <div class="sponsor-list-item flex-5">
                            D.K.S.Siriwardhana
                        </div>
                        <div class="sponsor-list-item flex-3">
                            Rs.2000.00
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <div class="sponsor-list-img-btns">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item flex-1">
                            2000
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                        </div>
                        <div class="sponsor-list-item flex-5">
                            D.K.S.Siriwardhana
                        </div>
                        <div class="sponsor-list-item flex-3">
                            Rs.2000.00
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <div class="sponsor-list-img-btns">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

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
            </section>

    </div>
</section>

</body>

</html>

