<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_7.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <!-- Middle part for whole content -->
            <section class="mid-content">
                <h2><?php echo  "Hello " . $_SESSION['name'] . "!" ?></h2>
                <h3> Some Private classes You Enrolled</h3>
                <!-- subject cards -->
                <div class="container-box">
                    <div>
                        <!-- new data from DB -->
                        <?php if (!empty($data[0])) { ?>
                            <div class="subject-card-set">

                                <?php foreach (array_slice($data[0], 0, 3) as $row) { ?>
                                    <div class="subject-card">
                                        <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                                        <a href="#"><label><?php echo $row->class_name ?></label></a>
                                        <!-- <label>Grade <?php echo $row->grade + 5 ?></label> -->
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } else {
                            echo "no data!";
                        } ?>
                    </div>
                </div>
            </section>
            <section style="margin:auto;">
                <!-- join to new class -->
                <div class="top-bar-btns " >
                    <a style="padding-right: 300px;" href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
                        <div class="see-all-btn">Join to new class</div>
                    </a>

                    <a style="padding-left: 300px;" href="<?php echo BASEURL  ?>st_private_mode/st_myclasses">
                        <div class="see-all-btn">View My classes</div>
                    </a>
                </div>
            </section>
    </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>