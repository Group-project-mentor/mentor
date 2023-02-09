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
        <?php include_once "components/navbars/rc_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'rcResources/documents/'.$_SESSION['gid']."/".$_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
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
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / documents / <?php echo $data[2]?></h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box" >
                    <embed src="<?php echo BASEURL?>public_resources/documents/<?php echo $data[2] ?>" style="width:50%;height:70vh;margin:auto;">
                </div>
            <?php } ?>
            </section>
        </div>
    </section>
</body>
</html>