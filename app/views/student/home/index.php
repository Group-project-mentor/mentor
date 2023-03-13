<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Home</title>

    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css"> <!-- BASEURL use to navigate pages -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/st_student.css">

    <style>
        .see-all-btn {
            text-decoration: none;
            padding: 3px;
            width: 10%;
            
        }

        .image-container {
            justify-content: center;
            align-items: center;
            /* Set the height of the container to the full viewport height */
        }

        body {
            background-image: url('assets/grades/logo1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL  ?>st_profile">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
            <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; width:100%;"></a>
            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title" style="width:50%;">
                    <h1>Student</h1>
                    <br>
                    <!-- <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; width:100%;"></a> -->
                </div>
                <!-- <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; width:100%;"></a> -->

                <!-- Grade choosing interface -->
                <div class="container-box" style="padding-left: 160px; width:200%; height:10%;">
                    <div class="grade-switcher">

                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/1">Grade 6</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/2">Grade 7</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/3">Grade 8</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/4">Grade 9</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/5">Grade 10</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/6">O/L</a>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/index/7">A/L</a>

                    </div>
                </div>
                <br><br>
                <!-- <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; width:100%;"></a> -->
                <div>

                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <a class="see-all-btn" href="<?php echo BASEURL  ?>st_private_mode" style="text-decoration: none; width:10%">Private</a>
                </div>

        </div>
    </section>
    </div>
    </section>
</body>

<script src="<?php echo BASEURL ?>javascripts/st_navbar_1.js"></script>

</html>