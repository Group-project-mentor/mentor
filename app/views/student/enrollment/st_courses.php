

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/st_card_set.css">
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
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL  ?>">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Subjects</h1>
                    <h6>Hello </h6>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <div>
                        <h2>Enrolled Subjects</h2>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/Enroll_subject_all" style="text-decoration: none; ">See All</a>
                    </div>

                    <!-- tempary movement -->
                    <div class="subject-card" >
                        <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                        <a href="<?php echo BASEURL  ?>st_video"><label>C89 - Dancing</label></a>
                        <label>Grade 8</label>
                    </div>

                    <?php if(!empty($data[1])){?>
                        <div class="subject-card-set">
                            <?php foreach($data[1] as $row) {?>
                            <div class="subject-card">
                                <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                                <a href="#"><label><?php echo $row['name'] ?></label></a>
                                <label>Grade 8</label>
                            </div>
                            <?php } ?>
                        </div>
                        <?php }
                        else { ?>
                        <br><br>
                        <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                            <?php echo "No Courses Enrolled yet !";} ?>
                        </h2>
                        <br><br>
                    </div>
                    <div>
                        <h2>Subject to Enrolled</h2>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>st_courses/Subject_to_Enroll_all" style="text-decoration: none;">See All</a>
                    </div>
                    <?php if(!empty($data[0])){?>
                        <div class="subject-card-set">
                            <?php foreach($data[0] as $row) {?>
                            <div class="subject-card">
                                <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                                <a href="#"><label><?php echo $row['name'] ?></label></a>
                                <label>Grade 8</label>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } else {echo "no data!";} ?>
                    
                    </div>
                </div>

        </div>

    </section>
</body>
    <script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>

