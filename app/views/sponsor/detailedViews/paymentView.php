<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment preview</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="#">
                    <a class="back-btn" href="<?php echo BASEURL ?>sponsor/transactionHistory">Back</a>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and subtitle of middle part -->
            <div class="mid-title">
                <h1>Payment Details</h1>
                <h6>slips / payments / Slip No <?php echo $data[0]->id ?></h6>
            </div>

            <!-- * content area -->
            <div class="container-box">
<!--                <h1 class="report-title">Payment Details </h1>-->
                <div class="sponsor-detail-cell" style="max-width: 1000px;margin: auto;">
                    <div class="details width-400-center wrap-on">
                        <div class="sponsor-list-main" style="padding: 20px">
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Payment ID :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[0]->paymentId ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Paid Amount :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell txt-wrap-off">
                                    <?php echo $data[0]->currency ?>&nbsp;
                                    <?php echo number_format($data[0]->amount, 2, '.', ',') ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Payment Type :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[0]->method ?>
                                </div>
                            </div>
                        </div>
                        <?php $date = explode(' ', $data[0]->timestamp ) ?>
                        <div class="sponsor-list-main" style="padding: 20px;">
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                    Date :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $date[0] ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                    Time :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $date[1] ?>
                                </div>
                            </div>
                            <a class="sponsor-button" style="margin-top: 10px;width: 90%;justify-content: center;font-size: smaller;">
                                See Bill Details >>
                            </a>
                    </div>
                </div>
                <div class="sp-button-set">
                    <button class="sponsor-button">
                        Download the slip
                    </button>
                </div>
            </div>

    </div>
</section>
</body>
</html>
