<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>

    <?php
    if (!empty($data[1]) && $data[1] == "success") {
        include_once "components/alerts/password_changed.php";
    }
    ?>

    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <div class="rc-resource-header">
                    <!-- Title and sub title of middle part -->
                    <div class="mid-title">
                        <h1>Teacher Profile</h1>
                    </div>

                    <a href="<?php echo BASEURL . 'logout' ?>">
                        <div class="rc-add-btn">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_logout.png" class="rc-profile-arrow-btn" style="width: 15px;height:15px;margin:auto; ">
                            Logout
                        </div>
                    </a>

                </div>

                <div class="rc-profile">
                    <div class="rc-profile-main">
                        <a class="rc-profile-image" href="<?php echo BASEURL ?>TProfile/change/image">
                            <img src="<?php echo (!empty($data[0]->image)) ? $data[0]->image : BASEURL . "assets/clips/profile_img.webp" ?>" alt="profile" id="profileImg" style="object-fit: cover;" />
                            <span class="rc-profile-change-btn hidden" id="changeBtn">Change</span>
                        </a>
                        <div class="rc-profile-table">
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    User ID
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        <?php echo (!empty($data[0]->id)) ? $data[0]->id : "" ?>
                                    </div>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        <?php echo (!empty($data[0]->name)) ? $data[0]->name : "" ?>
                                    </div>
                                    <a href="<?php echo BASEURL ?>TProfile/change/name">
                                        <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Email
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        <?php echo (!empty($data[0])) ? $data[0]->email : "" ?>
                                    </div>
                                    <a>
                                        <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Mobile Number
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        <?php echo (!empty($data[0])) ? $data[0]->mobile_no : "" ?>
                                    </div>
                                    <a href="<?php echo BASEURL ?>TProfile/change/mobile">
                                        <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                    </a>
                                </div>
                            </div>
                            <a class="rc-profile-row" style="text-decoration:none;padding:10px" href="<?php echo BASEURL ?>TProfile/change/password">
                                <div class="rc-profile-left" style="color:black;">
                                    Update Password
                                </div>
                                <div class="rc-profile-right">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </div>
                            </a>
                            <a class="rc-profile-row txt-red">
                                <div class="rc-profile-left">
                                    Delete Account
                                </div>
                                <div class="rc-profile-right">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

</body>

<script>
    let profileImg = document.getElementById('profileImg');
    let changeBtn = document.getElementById('changeBtn');

    profileImg.addEventListener('mouseover', () => {
        profileImg.classList.add('rc-profile-img-hidden');
        changeBtn.classList.remove('hidden');
    });

    profileImg.addEventListener('mouseout', () => {
        profileImg.classList.remove('rc-profile-img-hidden');
        changeBtn.classList.add('hidden');
    })
</script>

</html>