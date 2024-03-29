<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">
</head>

<body>

    <!-- message pop up when click delete button -->
    <?php
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "Enroll") {
            $message = "You Enroll to Subject Successfully !";
            include_once "components/alerts/operationSuccess.php";
        } else if ($_SESSION['message'] == "NOEnroll") {
            $message = "You Already Enroll To this Subject !";
            include_once "components/alerts/operationFailed.php";
        }
    }
    ?>

    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL  ?>">Back</a>
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
                    <h6>Welcome To Your Page</h6>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <div>

                        <h2>Grade <?php echo $_SESSION['gid'] + 5 ?> - Enrolled Subjects</h2>
                        <a class="see-all-btn" href="<?php echo BASEURL . 'st_courses/Enroll_subject_all/' . $_SESSION['gid']  ?>" style="text-decoration: none; ">See All</a>
                    </div>



                    <?php if (!empty($data[1])) { ?>
                        <div class="subject-card-set">
                            <?php foreach (array_slice($data[1], 0, 3) as $row) { ?> <!-- foreach == for -->
                                <div class="subject-card">
                                    <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                                    <label><?php echo $row->name ?></label>
                                    <label>Grade <?php echo $_SESSION['gid'] + 5 ?></label>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } else { ?>
                        <br><br>
                        <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                        <?php echo "No Courses Enrolled yet !";
                    } ?>
                        </h2>
                        <br><br>
                </div>
                <div>
                    <h2>Grade <?php echo $_SESSION['gid'] + 5 ?> - Subject to Enrolled</h2>
                    <a class="see-all-btn" href="<?php echo BASEURL . 'st_courses/Subject_to_Enroll_all/' . $_SESSION['gid']  ?>" style="text-decoration: none;">See All</a>
                </div>
                <?php if (!empty($data[0])) { ?>
                    <div class="subject-card-set">

                        <?php foreach (array_slice($data[0], 0, 3) as $row) { ?>
                            <div class="subject-card">
                                <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                                <label><?php echo $row->name ?></label>
                                <label>Grade 8</label>
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

        </div>

    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>