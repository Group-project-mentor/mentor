

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-Cources</title>
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
                        <a class="back-btn" href="<?php echo BASEURL  ?>st_courses">Back</a>
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
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>enrolled_subject" style="text-decoration: none; ">See All</a>
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
                        <?php } else {echo "No Course Enrolled yet !";} ?>
                    </div>

                    <!-- <div class="subject-card-set">
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C79 - Science</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                            <a href="#"><label>C80 - Mathematics</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C81 - Sinhala</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C82 - History</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C83 - Health</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C84 - English</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C85 - Buddhism</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/4.png" alt="" />
                            <a href="#"><label>C86 - Tamil</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/5.png" alt="" />
                            <a href="#"><label>C87 - Geography</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/6.png" alt="" />
                            <a href="#"><label>C88 - IT</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C89 - Dancing</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                            <a href="#"><label>C90 - Music</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C91 - English lit.</label></a>
                            <label>Grade 8</label>
                         
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/4.png" alt="" />
                            <a href="#"><label>C92 - Art</label></a>
                            <label>Grade 8</label>
                           
                        </div>

                    </div>  -->
                    

                    <div>
                        <h2>Subject to Enrolled</h2>
                        <a class="see-all-btn" href="<?php echo BASEURL  ?>subject_to_enroll" style="text-decoration: none;">See All</a>
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
                
                    <!-- <div class="subject-card-set">
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C79 - Science</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                            <a href="#"><label>C80 - Mathematics</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C81 - Sinhala</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C82 - History</label></a>
                            <label>Grade 8</label>
                            
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C83 - Health</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C84 - English</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C85 - Buddhism</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/4.png" alt="" />
                            <a href="#"><label>C86 - Tamil</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/5.png" alt="" />
                            <a href="#"><label>C87 - Geography</label></a>
                            <label>Grade 8</label>
                           
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/6.png" alt="" />
                            <a href="#"><label>C88 - IT</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C89 - Dancing</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/2.png" alt="" />
                            <a href="#"><label>C90 - Music</label></a>
                            <label>Grade 8</label>
                          
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C91 - English lit.</label></a>
                            <label>Grade 8</label>
                         
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL  ?>assets/patterns/4.png" alt="" />
                            <a href="#"><label>C92 - Art</label></a>
                            <label>Grade 8</label>
                           
                        </div>

                    </div> -->
                </div>

        </div>

    </section>
</body>
    <script src="<?php echo BASEURL ?>public/javascripts/rc_auth_script.js"></script>

</html>

