<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>My classes</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
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
                    <a href="<?php echo BASEURL; ?>st_private_mode">
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
                <h3>These Are The All Classes You Enrolled. By Clicking The <b style="color:green">VIEW</b> Button, You Can Go To Relevant Class.</h3>
                <!-- subject cards -->
                <div class="container-box">
                    <div>

                        <!-- new data from DB -->
                        <?php if (!empty($data[0])) { ?>
                            <div class="subject-card-set">

                                <?php foreach ($data[0] as $row) { ?>
                                    <div class="subject-card">
                                        <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                                        <label>Class Name  : <?php echo $row->class_name ?></label>
                                        <label>Monthly Fees : <?php echo $row->fees ?>.00 LKR</label>
                                        <a href="<?php echo BASEURL . 'st_private_resources/index/' . $row->class_id . '/' . $row->class_name  ?>"><label>View</label></a>
                                        <!-- <a href="<?php //echo BASEURL . 'st_billing/index/' . $row->class_id . '/' . $row->class_name  ?>"><label>View</label></a> -->

                                    </div>
                                <?php } ?>
                            </div>
                            <?php } else { ?>
                    <br><br>
                    <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                    <?php echo "No Courses Enrolled yet !";
                } ?>
                    </div>

                </div>

            </section>
    </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>