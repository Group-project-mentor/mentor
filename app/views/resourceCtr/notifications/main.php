<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Notifications</h1>
                </div>

                <div class="resource-tab-main">
                    <div class="resource-tab-pane">
                        <div class="tp-tab active">
                            Unread
                        </div>
                        <div class="tp-tab active">
                            All
                        </div>
                        <div class="tp-tab">
                            Read
                        </div>
                    </div>
                </div>

                <hr style="border: 1px solid rgba(128,128,128,0.06);width: 50%;margin: auto;"/>
                

                <section class="tab-container" style="display: flex;justify-content: center;">
                    <div class="sponsor-list-main row-decoration" id="info-table">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                Message
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                
                            </div>
                        </div>
                        <?php  if (empty($data[0])) {?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO UNREAD NOTIFICATIONS
                                </div>
                            </div>
                        <?php } else { foreach ($data[0] as $row) {
                            if($row->seen == 0){
                        ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-5">
                                <?php echo $row->message ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('Y-m-d', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('H:i', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1" style="display:flex;align-items:center;justify-content:space-evenly;">
                                <a href="<?php echo BASEURL.'notification/readNotification/'.$row->id ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon-correct-green.png" alt="" style="width: 20px;margin:0 5px;">
                                </a>
                                <a href="<?php echo BASEURL.'notification/deleteNotification/'.$row->id ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon-incorrect-red.png" alt="" style="width: 25px;margin:0 5px;">
                                </a>
                            </div>
                        </div>
                        <?php }}}?>
                    </div>
                </section>

                <section class="tab-container" style="display: flex;justify-content: center;">
                    <div class="sponsor-list-main row-decoration" id="info-table">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                Message
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                
                            </div>
                        </div>
                        <?php  if (empty($data[0])) {?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO NOTIFICATIONS
                                </div>
                            </div>
                        <?php } else { foreach ($data[0] as $row) {
                        ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-5">
                                <?php echo $row->message ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('Y-m-d', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('H:i', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1" style="display:flex;align-items:center;justify-content:space-evenly;">
                            <?php if($row->seen == 0){ ?>
                                <a href="<?php echo BASEURL.'notification/readNotification/'.$row->id ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon-correct-green.png" alt="" style="width: 20px;margin:0 5px;">
                                </a>
                            <?php } ?>
                                <a href="<?php echo BASEURL.'notification/deleteNotification/'.$row->id ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon-incorrect-red.png" alt="" style="width: 25px;margin:0 5px;">
                                </a>
                            </div>
                        </div>
                        <?php  }}?>
                    </div>
                </section>

                <section class="tab-container" style="display: flex;justify-content: center;">
                <div class="sponsor-list-main row-decoration" id="info-table">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                Message
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                <a href="<?php echo BASEURL.'notification/delAllReadNotifi' ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_delete.png" alt="" style="width: 20px;margin:0 5px;">
                                </a>
                            </div>
                        </div>
                        <?php  if (empty($data[0])) {?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO READ NOTIFICATIONS
                                </div>
                            </div>
                        <?php } else { foreach ($data[0] as $row) {
                            if($row->seen == 1){
                        ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-5">
                                <?php echo $row->message ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('Y-m-d', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo date('H:i', strtotime($row->timestamp)); ?>
                            </div>
                            <div class="sponsor-list-item flex-1" style="display:flex;align-items:center;justify-content:space-evenly;">
                                <a href="<?php echo BASEURL.'notification/deleteNotification/'.$row->id ?>">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon-incorrect-red.png" alt="" style="width: 25px;margin:0 5px;">
                                </a>
                            </div>
                        </div>
                        <?php }}}?>
                    </div>
                </section>

                <!-- bottom part -->
                <section class="bottom-section-grades">
                    
                </section>

        </div>
    </section>
</body>
<script>
    let tab = document.getElementsByClassName('tp-tab');
    let tabCont = document.getElementsByClassName('tab-container');

    // ? Tab - containers handler
    for (let j = 1; j < tabCont.length; j++) {
        tabCont[j].style.display = 'none';
        tab[j].classList.remove('active');
    }

    for (let i = 0; i < tab.length; i++){
        tab[i].onclick = () => {
            for (let j = 0; j < tabCont.length; j++) {
                if (i!==j) {
                    tabCont[j].style.display = 'none';
                    tab[j].classList.remove('active');
                }
            }
            tabCont[i].style.display = 'flex';
            tab[i].classList.add('active');
        }
    }
</script>
</html>
