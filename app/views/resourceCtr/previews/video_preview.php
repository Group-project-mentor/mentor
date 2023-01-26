<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/st_card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>

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
                <a href="<?php echo BASEURL . 'rcResources/videos/' . $_SESSION['gid'] . "/" . $_SESSION['sid'] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">
            <!-- subject cards -->
            <div class="container-box">
                <div class="rc-resource-header">
                        <h1>V I D E O</h1>
                        <div style="display: flex;">
                            <a href="<?php echo BASEURL . 'rcAdd/other' ?>" style="margin:5px 10px;">
                                <div class="rc-add-btn">
                                    Edit <img style="width: 15px;" src="<?php echo BASEURL ?>assets/icons/icon_edit_white.png" alt=''>
                                </div>
                            </a>
                            <a href="<?php echo BASEURL . 'rcAdd/other' ?>" style="margin:5px 10px;">
                                <div class="rc-add-btn" style="display: flex; align-items:center;">
                                    Delete <img style="width: 15px;" src='<?php echo BASEURL ?>assets/icons/icon_delete_white.png' alt=''>
                                </div>
                            </a>
                        </div>
                    </div>
                <h2><?php echo $data[1][1] ?></h2>

                <div class="subject-card-watching">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/jrISECT_48E" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    <iframe style="width: 720px;height:480px;" src="<?php echo $data[1][4] ?>" frameborder="1"></iframe>
                </div>

                <h2>Description</h2>
                <p class="Description">
                    <?php echo $data[1][3] ?>
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
                </div>
            </div>
    </div>
</section>
</div>
</section>
</body>
</html>
