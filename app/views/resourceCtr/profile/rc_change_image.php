<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change image</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_profile.css">
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>rcprofile">
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
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Profile - Change Image</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>

                <form class="rc-profile rc-profile-change">
                    <div class="rc-profile-change-img">
                        <img id="profImg" src="<?php echo (!empty($data[0])) ? $data[0] : BASEURL."assets/clips/profile_img.webp" ?>" alt="profile image">
                    </div>

                    <!-- todo: want to do the functionality and style -->
                    <div class="rc-profile-change-input">
                        <input type="file" name="image" id="fileChooser">
                        <a id="sub-btn">SAVE</a>
                        <h3 style="color: purple;font-family:Arial" id="msg"></h3>
                    </div>
                </form>
            </section>

        </div>
    </section>
    </div>
    </section>
</body>

<script src="<?php echo BASEURL . '/public/javascripts/rc_change_profile.js' ?>"></script>

</html>