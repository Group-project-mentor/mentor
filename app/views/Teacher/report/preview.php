<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>RC-Cources</title>
        <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
        <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <section class="page">
        
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'TReport/studentReports/'.$_SESSION['cid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
            <?php
            if(empty($data)){
                echo "<center style='color:red;font-size:x-large;'>No file ! </center>";
                // header("location:".BASEURL."rcResources/documents/".$_SESSION['gid']."/".$_SESSION['sid']);
            }
            else{
            ?>
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['cid']) ?> / documents / <?php echo $data->id ?></h6>
                    <h6>Student ID - <?php echo ucfirst($_SESSION['sid']) ?></h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box" >
                    <embed src="<?php echo BASEURL?>data/reports/<?php echo $_SESSION['cid']."/".$data->location ?>" style="width:50%;height:70vh;margin:auto;">
                </div>
            <?php } ?>
            </section>
        </div>
    </section>
</body>
</html>