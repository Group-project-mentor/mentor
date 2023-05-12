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
                    
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL.'st_public_resources/index_videos/'.$_SESSION['gid'].'/'.$_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content" style="margin: 10px 0 10px;">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                <h1>V I D E O</h1>
                </div>


                <!-- subject cards -->
                <div class="container-box">
                    <!-- <h2>C79 - lesson 1</h2> -->

                    <!-- <div class="subject-card-watching">
                        <img src="<?php echo BASEURL ?>assets/patterns/1.png" alt="" />
                    </div> -->

                    <!-- kavi -->

                </div>
                    <h2 style="margin: 0 20px;"><?php echo $data[1]->name ?></h2>
                    <!-- <?php print_r($data) ?> -->

                    <div class="subject-card-watching">
                        <?php if($data[1]->type === "L"){ ?>
                            <iframe style="width: 720px;height:480px;" src="<?php echo $data[1]->link ?>"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                            </iframe>
                        <?php }elseif($data[1]->type === "U"){ ?>
                            <video class="rc-uploaded-video" controls>
                                <source src="<?php echo BASEURL.'public/public_resources/videos/'.$data[1]->link ?>" >
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>
                    </div>

                    <!-- kavi -->
                    <h2>Description</h2>
                    <p class="Description">
                    <?php echo $data[1]->description?>
                    </p>
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