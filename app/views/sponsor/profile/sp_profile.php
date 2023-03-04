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
if (!empty($_SESSION['message']) && $_SESSION['message'] == "invalid operation") {
    include_once "components/alerts/sponsor/operationFailed.php";
}
elseif (!empty($_SESSION['message'])) {
    include_once "components/alerts/sponsor/operationSuccess.php";
}
?>

<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">



            <div class="rc-resource-header">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Sponsor Profile</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>
                <a href="<?php echo BASEURL . 'logout' ?>">
                    <div class="rc-add-btn">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_logout.png"  class="rc-profile-arrow-btn" style="width: 15px;height:15px;margin:auto;">
                        Logout
                    </div>
                </a>
            </div>

            <div class="rc-profile">
                <div class="rc-profile-main">
                    <a class="rc-profile-image" href="<?php echo BASEURL ?>rcProfile/change/image">
                        <img src="<?php echo (!empty($data[0][4])) ? $data[0][4] : BASEURL . "assets/clips/profile_img.webp" ?>"
                             alt="profile"
                             id="profileImg"
                             style="object-fit: cover;"/>
                        <span class="rc-profile-change-btn hidden" id="changeBtn">Change</span>
                    </a>
                    <div class="rc-profile-table">
                        <div class="rc-profile-row">
                            <div class="rc-profile-left">
                                User ID
                            </div>
                            <div class="rc-profile-right">
                                <div>
                                    <?php echo (!empty($data[0])) ? $data[0][0] : "1" ?>
                                </div>
                            </div>
                        </div>
                        <div class="rc-profile-row">
                            <div class="rc-profile-left">
                                First Name
                            </div>
                            <div class="rc-profile-right">
                                <div>
                                    <?php echo (!empty($data[0])) ? $data[0][1] : "Sample" ?>
                                </div>
                                <a href="<?php echo BASEURL ?>rcProfile/change/name">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </a>
                            </div>
                        </div>
                        <div class="rc-profile-row">
                            <div class="rc-profile-left">
                                Second Name
                            </div>
                            <div class="rc-profile-right">
                                <div>
                                    <?php echo (!empty($data[0])) ? $data[0][1] : "Sample" ?>
                                </div>
                                <a href="<?php echo BASEURL ?>rcProfile/change/name">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </a>
                            </div>
                        </div>
                        <div class="rc-profile-row">
                            <div class="rc-profile-left">
                                Display Name
                            </div>
                            <div class="rc-profile-right">
                                <div>
                                    <?php echo (!empty($data[0])) ? $data[0][1] : "Sample" ?>
                                </div>
                                <a href="<?php echo BASEURL ?>rcProfile/change/name">
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
                                    <?php echo (!empty($_SESSION['email'])) ? $_SESSION['user'] : "email" ?>
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
                                    <?php echo (!empty($data[0])) ? $data[0][3] : "077777777" ?>
                                </div>
                                <a href="<?php echo BASEURL ?>rcProfile/change/mobile">
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </a>
                            </div>
                        </div>
                        <div class="rc-profile-row">
                            <div class="rc-profile-left">
                                Personal Description
                            </div>
                            <div class="rc-profile-right">
                                <div>
                                    <?php echo (!empty($_SESSION['email'])) ? $_SESSION['user'] : "Hello" ?>
                                </div>
                                <a>
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                </a>
                            </div>
                        </div>
                        <a class="rc-profile-row" style="text-decoration:none;padding:10px" href="<?php echo BASEURL ?>rcProfile/change/password">
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

    profileImg.addEventListener('mouseover',()=>{
        profileImg.classList.add('rc-profile-img-hidden');
        changeBtn.classList.remove('hidden');
    });

    profileImg.addEventListener('mouseout',()=>{
        profileImg.classList.remove('rc-profile-img-hidden');
        changeBtn.classList.add('hidden');
    })

</script>

</html>