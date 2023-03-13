<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL.'st_documents/index/'.$_SESSION['gid'].'/'.$_SESSION['sid']?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
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
                <div class="mid-title">
                    <?php 
                    $ssid = 'sinhala'; ?>
                    <h6>My Subjects / <?php echo ucfirst($ssid) ?> / documents / <?php echo $_SESSION['gid'] ?></h6>
                </div>
                    <br>
                    <hr style=" height:5px ; background-color:green ;">
                    <br>
                    <div>
                        <p>Click on the image to download Document : </p>
                        <p>
                            <br>
                            <a href="<?php echo BASEURL?>public_resources/documents/<?php echo $_SESSION['gid']."/".$_SESSION['sid']."/".$data->location ?>" download>
                                <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="downloard">
                            </a>
                        </p>
                    </div>
                    <?php } ?>
            </section>
        </div>
    </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>