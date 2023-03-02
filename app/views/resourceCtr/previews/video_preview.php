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
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>
<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>

    <section class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a href="javascript:history.go(-1)">
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
        <section class="mid-content" style="margin: 10px 0 10px;">
            <!-- subject cards -->
            <div class="container-box" style="margin-top: 10px;">
                <div class="rc-resource-header">
                        <h1>V I D E O</h1>
                        <div style="display: flex;">
                            <a href="<?php echo BASEURL . 'rcEdit/video/' . $data[1][0] ?>" style="margin:5px 10px;">
                                <div class="rc-add-btn">
                                    Edit <img style="width: 15px;" src="<?php echo BASEURL ?>assets/icons/icon_edit_white.png" alt=''>
                                </div>
                            </a>
                            <a style="margin:5px 10px;cursor:pointer;" onclick='delConfirm("<?php echo $data[1][0] ?>",1);'>
                                <div class="rc-add-btn" style="display: flex; align-items:center;background:#AA1100;">
                                    Delete <img style="width: 15px;" src='<?php echo BASEURL ?>assets/icons/icon_delete_white.png' alt=''>
                                </div>
                            </a>
                        </div>
                </div>
                <h2 style="margin: 0 20px;"><?php echo $data[1][1] ?></h2>

                <div class="subject-card-watching">
                    <?php if($data[1][6] === "L"){ ?>
                        <iframe style="width: 720px;height:480px;" src="<?php echo $data[1][4] ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                        </iframe>
                    <?php }elseif($data[1][6] === "U"){ ?>
                        <video class="rc-uploaded-video" controls>
                            <source src="<?php echo BASEURL.'public/public_resources/videos/'.$data[1][4] ?>" >
                            Your browser does not support the video tag.
                        </video>
                    <?php } ?>
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
        </section>
    </section>
</section>

</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>
</html>
