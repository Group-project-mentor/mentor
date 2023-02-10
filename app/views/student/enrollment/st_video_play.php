<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_card_set.css">
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
                    <a href="<?php echo BASEURL ?>st_video">
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

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Subjects</h1>
                    <h6>Hello </h6>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <h2>C79 - lesson 1</h2>

                    <div class="subject-card-watching">
                        <img src="<?php echo BASEURL ?>assets/patterns/1.png" alt="" />
                    </div>




                    <h2>Description</h2>
                    <p class="Description">
                        We take learning very seriously at Success Tutorial School. <br>
                        We have a special recipe for success and we owe everything to careful preparation. 
                        Just like any good ol’ recipe, it takes the best ingredients, and careful preparation to ensure the best results. 
                        To get our students ready for their lessons at school, we understand who they are, needs and goals. 
                        From there, we carefully craft a program that works for them, not us. 
                        After all, every student is different in their own way and have different goals they want to achieve, and we respect that! 
                        When students see that others’ care about their needs and goals, they automatically become more engaged 
                        and want to learn – when students want to learn, academic results can naturally be seen <br><br>
                        From there, we carefully craft a program that works for them, not us. 
                        After all, every student is different in their own way and have different goals they want to achieve, and we respect that! 
                        When students see that others’ care about their needs and goals, they automatically become more engaged 
                        and want to learn – when students want to learn, academic results can naturally be seen </p>

                    <div>
                    <h3>Related Videos</h3>
                </div>
                <div class="subject-card-set">
                    <div class="subject-card">
                        <img src="<?php echo BASEURL ?>assets/patterns/2.png" alt="" />
                        <a href="#"><label>C79 - lesson 2</label></a>
                        <label>Grade 8</label>
                        <button class="Enter-btn">Enter</button>
                    </div>
                    <div class="subject-card">
                        <img src="<?php echo BASEURL ?>assets/patterns/3.png" alt="" />
                        <a href="#"><label>C79 - lesson 3</label></a>
                        <label>Grade 8</label>
                        <button class="Enter-btn">Enter</button>
                    </div>
                    <div class="subject-card">
                        <img src="<?php echo BASEURL ?>assets/patterns/3.png" alt="" />
                        <a href="#"><label>C79 - lesson 4</label></a>
                        <label>Grade 8</label>
                        <button class="Enter-btn">Enter</button>
                    </div>
                    <div class="subject-card">
                        <img src="<?php echo BASEURL ?>assets/patterns/3.png" alt="" />
                        <a href="#"><label>C79 - lesson 5</label></a>
                        <label>Grade 8</label>
                        <button class="Enter-btn">Enter</button>
                    </div>

                </div>
        </div>
        </div>
    </section>
    </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>