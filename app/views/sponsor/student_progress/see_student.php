<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Student</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
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
                <a href="<?php echo BASEURL ?>sponsor/allStudents">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Student Program</h1>
                <h2>Student Profile</h2>
            </div>

            <!-- bottom part -->
            <section class="bottom-section-grades" style="flex-direction: column;align-items:center;">
                <div class="bottom-section-title" style="justify-self: flex-end;">
                    <a class="sponsor-button" href="<?php echo BASEURL."sponsor/payAllMoths/".$data[0]->id ?>" style="text-decoration: none;">
                        Pay All Amount
                        <img src="<?php echo BASEURL ?>assets/icons/icon_pay_all_white.png" alt="" style="width: 20px;">
                    </a>
                </div>
                <div class="sponsor-student-prof">
                    <div class="prof">
                        <div class="image">
                            <?php if(empty($data[0]->image)){ ?>
                                <img src="<?php echo BASEURL ?>assets/clips/no_profile.jpg">
                            <?php }else{ ?>
                                <img src="<?php echo $data[0]->image ?>">
                            <?php } ?>
                        </div>
                        <div class="details">
                            <h3>Student Details</h3>
                            <div class="sponsor-list-main" style="padding: 20px">
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        ID :
                                    </div>
                                    <div class="sponsor-list-item flex-2 sponsor-detail-cell">
                                        <?php echo $data[0]->id ?>
                                    </div>
                                </div>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        Name :
                                    </div>
                                    <div class="sponsor-list-item flex-2 sponsor-detail-cell">
                                        <?php echo $data[0]->name ?>
                                    </div>
                                </div>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell">
                                        Months Remaining :
                                    </div>
                                    <div class="sponsor-list-item flex-2 sponsor-detail-cell">
                                    <?php 
                                        echo $data[3] . " Months";
                                    ?>
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

