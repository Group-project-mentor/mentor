<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Past Papers</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'st_profile/generate_report_private' . '/' . $_SESSION['cird']  ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Hello <?php echo $_SESSION['name'] ?> !</h2>
                    <h3>This is Your Report.</h3>
                </div>
                <!-- Grade choosing interface -->
                <div class="container-box">

                    <?php
                    if (!empty($data[0])) { ?>
                        <div class="rc-resource-table">
                            <div class="rc-pp-row rc-pp-row-head">
                                <div class="rc-resource-col">Report Name </div>
                                <div></div>
                            </div>
                            <?php foreach ($data[0] as $row) { ?>
                                <div class='rc-pp-row'>

                                    <div class='rc-resource-col' style="display: flex;align-items: center;justify-content: flex-start;">

                                        <div>
                                            <?php echo $row->name ?>
                                        </div>
                                        <div></div>
                                        <div></div>
                                        
                                        <div>
                                            <a href="<?php echo BASEURL . "st_profile/generate_report_private_class/" . $_SESSION['cird']  ?>">
                                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php   }
                        } else { ?>
                            <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php } ?>
                        </div>
                </div>
        </div>
    </section>
</body>

</html>