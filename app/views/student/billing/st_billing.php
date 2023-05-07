<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments in Progress</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?>
        <?php include_once "components/alerts/rightAlert.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo  BASEURL ?>st_profile">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo  BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Hello <?php echo $_SESSION['name'] ?> !</h2>
                    <h1>Payments in Progress</h1>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div style="margin-top: 20px;display: flex;justify-content: space-between;">
                        <div>
                            <?php if (!empty($data[2])) { ?>
                                <!-- <a href="<?php //echo BASEURL . "sponsor/slips/bills/" . $data[2]->id 
                                                ?>" type="button" class="sponsor-button" style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;"> -->
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon-pending-clock.png" alt="profile" style="width: 25px;">
                                Remaining Bill
                                </a>
                            <?php } ?>
                        </div>

                        <!-- <a href="<?php echo BASEURL ?>sponsor/transactionHistory" type="button" class="sponsor-button" style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;"> -->
                        <img src="<?php //echo BASEURL 
                                    ?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Transaction History
                        </a>
                    </div>
                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1" style="display:flex;flex-direction: column;align-items: center;justify-content: center;">
                                    <label style="font-size: smaller;margin-bottom: 10px;">all</label>
                                    <input id="chkAll" type="checkbox" class="save-info-check-main">
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
                                    0
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                        <button class="sponsor-button" style="font-size:large;margin: 0 5px;text-decoration: none;" id="bill-btn">
                            <img src="<?php echo BASEURL ?>public/assets/icons/icon_addBill.png" alt="profile" style="width: 25px;">
                            Add to bill
                        </button>
                    </div>

                </div>
        </div>
    </section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
</script>
<script src="<?php echo BASEURL ?>javascripts/spPaymentProgress.js"> </script>

</html>