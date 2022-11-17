<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_2.php" ?>
        

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="#">
                        <img src="assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'subjects' ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C79 - Science</h1>
                    <h6>My Subjects / C79</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>VIDEOS</h1>
                        <a href="">
                            <div class="rc-add-btn">
                                Add Video
                            </div>
                        </a>
                    </div>
                    <div class="rc-video-card-set">
                        <?php
                            if(!empty($data)){
                                foreach ($data as $row) {
                                    echo "<div class='rc-video-card'>
                                            <img src='".BASEURL."assets/patterns/1.png' alt='' />
                                            <a href=''><label>".$row['name']."</label></a>
                                            <div class='rc-video-card-btns'>
                                                <button class='rc-video-delete-btn'>
                                                    <img src='".BASEURL."assets/icons/icon_delete.png' alt=''>
                                                </button>
                                                <button class='rc-video-delete-btn'>
                                                    <img src='".BASEURL."assets/icons/icon_edit.png' alt=''>
                                                </button>
                                            </div>
                                        </div>";
                                }
                            }
                        ?> 

                    </div>
                </div>

        </div>

    </section>
</body>

</html>