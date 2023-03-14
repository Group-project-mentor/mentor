<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Bill preview</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
<!--    <script defer src="--><?php //echo BASEURL ?><!--javascripts/spPaymentProgress.js"> </script>-->

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
                <h1>Payment Bill</h1>
                <h6> slips / bills / <?php echo $data[0]->id ?> </h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div style="margin-top: 20px;display: flex;justify-content: space-between;">
                    <div class="rc-resource-header">
                        <h3>Bill Status :  <?php echo !empty($data[0]->status)?"Paid":"Not Paid" ?> </h3>
                    </div>
                    <?php if(!empty($data[0]->status) and !empty($data[0]->id)){ ?>
                    <a href="<?php echo BASEURL."sponsor/slips/payments/".$data[0]->payment_id ?>" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_slip.png" alt="profile" style="width: 25px;">
                        See Payment Slip
                    </a>
                    <?php }elseif(empty($data[0]->status)){ ?>
                        <a href="<?php echo BASEURL?>" type="button" class="sponsor-button"  style="background:darkred;font-size: medium;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                            <img src="<?php echo BASEURL?>public/assets/icons/icon_delete_white.png" alt="profile" style="width: 20px;">
                            Delete
                        </a>
                   <?php } ?>
                </div>
                <div style="margin-top: 30px;">
                    <div class="sponsor-list-main row-decoration">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Student ID
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                Name
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
                        <?php if(empty($data[1])){ ?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    Error in this bill <?php echo !empty($data[0]->payment_id)?"(Bill no : ".$data[0]->payment_id." )":"" ?>
                                </div>
                            </div>
                        <?php } else {
                            foreach ($data[1] as $row){
                                ?>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo $row->student_id ?>
                                    </div>
                                    <div class="sponsor-list-item flex-3">
                                        <?php echo $row->name ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2">
                                        <?php echo $row->year ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2">
                                        <?php echo getMonthName($row->month) ?>
                                    </div>
                                    <div class="sponsor-list-item flex-2 chk-amount">
                                        <?php echo number_format($row->monthlyAmount, 2, '.', '') ?>
                                    </div>
                                </div>

                            <?php }} ?>
                        <!-- Last Row -->
                        <div class="sponsor-list-row" style="padding: 15px 0;background: rgba(65,65,65,0.92) !important;border-radius: 0 0 10px 10px;">
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
                            <div class="sponsor-list-item flex-2" style="color: #ffffff;font-size: medium;" id="totalPrice">
                                <?php echo number_format($data[2], 2, '.', '') ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(empty($data[0]->status) and !empty($data[0]->id) and !empty($data[1])){ ?>
                <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                    <a href="<?php echo BASEURL.'sponsor/paymentTest' ?>" class="sponsor-button"  style="font-size:large;margin: 0 5px;text-decoration: none;">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Pay bill
                    </a>
                </div>
                <?php } ?>
            </div>
    </div>
</section>
</body>
</html>
