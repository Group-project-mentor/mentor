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
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
                <!-- join to new class -->
                <div class="top-bar-btns ">
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
                        <div class="see-all-btn">Join to new class</div>
                    </a>
                </div>

                <!-- subject cards -->
                <div class="container-box">
                    <div>
                        <!-- tempary movement 1-->
                        <!-- <div class="subject-card" style="text-align:center ;">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" style="width : 250px ; height:150px;"/>
                            <a href="<?php echo BASEURL  ?>st_private_mode/st_classroom_inside" ><label>Mathematics</label></a>
                            <label>Grade 8</label>
                            <label>Mr.Thimira Galahitiyawa</label>
                        </div> -->
                        <h3> Some Private classes You Enrolled</h3>
                        <br><br>
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

                    <div>
                        <br><br><br><br><br>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_private_mode/st_myclasses" style="text-decoration: none; ">My classes</a>
                    </div>

                </div>

            </section>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>