<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Enrolled Subjects</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->

        <!-- Right side container -->
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
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL . 'st_courses/index/' . $_SESSION['gid'] ?>">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Hello <?php echo $_SESSION['name'] ?> !</h2>
                    <h3>Enrolled Subjects</h3>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <?php if (!empty($data[0])) { ?>
                        <div class="subject-card-set">
                            <?php foreach ($data[0] as $row) { ?>
                                <div class="subject-card">
                                    <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                                    <a href="#"><label><?php echo $row->name ?></label></a>
                                    <label>Grade <?php echo $_SESSION['gid'] + 5 ?></label>
                                    <a href="<?php echo BASEURL . 'St_public_resources/index/' . $_SESSION['gid'] . '/' . $row->id . '/' .$row->name  ?>"><label>View</label></a>
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
            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>javascripts/st_navbar_1.js"></script>

</html>