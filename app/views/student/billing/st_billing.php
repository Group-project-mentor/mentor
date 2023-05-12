<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Bill preview</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo  BASEURL ?>st_profile">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Payment Bill</h1>
                    <h6> slips / bills / </h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <a href="<?php echo BASEURL ?>sponsor/transactionHistory" type="button" class="sponsor-button" style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Transaction History
                    </a>

                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Class ID
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                    Class Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Year
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Month
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Amount [LKR]
                                </div>
                            </div>
                            <?php if (empty($data[0])) { ?>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1">
                                        Error in this bill <?php echo !empty($data[0]->payment_id) ? "(Bill no : " . $data[0]->payment_id . " )" : "" ?>
                                    </div>
                                </div>
                            <?php } else {
                            ?>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo $data[0]->class_id ?>
                                    </div>
                                    <div class="sponsor-list-item flex-3">
                                        <?php echo $data[0]->class_name ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2">
                                        20<?php echo date('y') ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2">
                                        <?php echo date('n') ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2 chk-amount">
                                        <?php echo number_format($data[0]->fees, 2, '.', '') ?>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>


                    <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                        <a href="<?php echo BASEURL . 'st_billing/paymentTest/' ?>" class="sponsor-button" style="font-size:large;margin: 0 5px;text-decoration: none;">
                            <img src="<?php echo BASEURL ?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                            Pay bill
                        </a>
                    </div>
                </div>
        </div>
    </section>
</body>

</html>