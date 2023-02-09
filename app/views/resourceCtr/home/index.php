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
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Resource Creator</h1>
                    <h6>welcome <?php echo $_SESSION['name'] ?></h6>
                </div>

                <!-- bottom part -->
                <section class="bottom-section-grades">

<!--                    <div class="decorator">-->
<!--                        <img src="assets/clips/lap_man.png" alt="lap man">-->
<!--                    </div>-->
                    <div class="sponsor-student-prof">
                        <div class="bottom-details" style="margin: 10px 10px;height: 50vh;background: url('<?php echo BASEURL ?>assets/clips/lap_man.png') no-repeat;backdrop-filter: opacity(10)">
                            <div>
                                <div class="sp-subject-details">
                                    <h4>Subjects involved in</h4>
                                    <div class="sponsor-list-main border-no">
                                        <div class="sponsor-list-row">
                                            <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                Mathematics
                                            </div>
                                        </div>
                                        <div class="sponsor-list-row">
                                            <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                Sinhala
                                            </div>
                                        </div>
                                        <div class="sponsor-list-row">
                                            <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                Sinhala
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sp-subject-report">
                                    <h4>Detail Chart</h4>
                                    <img src="<?php echo BASEURL?>assets/clips/chart.webp" style="width: 400px;">
                                </div>
                            </div>

                            <div class="sp-subject-details">
                                <h4>Notifications</h4>
                                <div class="sponsor-list-main border-no">
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                            Mathematics
                                        </div>
                                    </div>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                            Sinhala
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

        </div>
    </section>
</body>

</html>
