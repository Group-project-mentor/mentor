<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_6.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL.'st_private_resources/index_documents/'.$_SESSION['class_name']?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL?>st_profile">
                    <?php include_once "components/profilePic.php"?>
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
                    <h6>Private Resources / <?php echo $_SESSION['class_name'] ?> / documents / <?php echo $_SESSION['rname'] ?></h6>
                </div>
                    <br>
                    <hr style=" height:5px ; background-color:green ;">
                    <br>
                <div class="container-box" >
                    <embed src="<?php echo BASEURL?>private_resources/documents/<?php echo $_SESSION['class_name']."/".$data->location ?>" style="width:50%;height:70vh;margin:auto;">
                </div>
            <?php } ?>
            </section>
        </div>
    </section>
</body>


</html>