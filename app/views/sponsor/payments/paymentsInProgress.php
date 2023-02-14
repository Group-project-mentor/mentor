<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments in Progress</title>
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
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
<!--                <a href="#">-->
<!--                    <a class="back-btn" href="--><?php //echo BASEURL ?><!--privateclass/billing">Back</a>-->
<!--                </a>-->
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Payments in Progress</h1>
                <h6> Billing / Payments in progress</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div style="margin-top: 20px;display: flex;justify-content: space-between;">
                    <div class="rc-resource-header">
                        <h3>Pay your remaining payment :  </h3>
                    </div>
                    <a href="<?php echo BASEURL?>sponsor/transactionHistory" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Transaction History
                    </a>
                </div>
                <div style="margin-top: 30px;">
                    <div class="sponsor-list-main row-decoration">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Number
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                Receiver
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                Account No
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                Amount
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                01
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                02
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                03
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                04
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                05
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <!-- Last Row -->
                        <div class="sponsor-list-row" style="padding: 15px 0;background: rgba(89,89,89,0.92);border-radius: 0 0 10px 10px;">
                            <div class="sponsor-list-item flex-1">
                            </div>
                            <div class="sponsor-list-item flex-3" style="color: #ffffff;font-size: medium;">
                                Total Payment
                            </div>
                            <div class="sponsor-list-item flex-3">
                            </div>
                            <div class="sponsor-list-item flex-2">
                            </div>
                            <div class="sponsor-list-item flex-1">
                            </div>
                            <div class="sponsor-list-item flex-2" style="color: #ffffff;font-size: medium;">
                                Rs: 10000.00
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                    <div type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;">Pay Total Fund</div>
                </div>

            </div>
    </div>
</section>
</body>
</html>