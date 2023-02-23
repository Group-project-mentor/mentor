<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <section class="page">
       <!-- Navigation panel -->
       <?php include_once "components/navbars/t_nav_1.php"?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                <a href="<?php echo BASEURL ?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>privateclass/profile">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
      
            <!-- Middle part for whole content -->
            <section class="mid-content">
            
            <div class="rc-resource-header">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Teacher Profile</h1>
                </div>

                <a href="<?php echo BASEURL . 'logout' ?>" >
                            <div class="rc-add-btn">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_logout.png"  class="rc-profile-arrow-btn" style="width: 15px;height:15px;margin:auto; ">
                                Logout
                            </div>
                        </a>

                        </div>        

                <div class="rc-profile">
                    <div class="rc-profile-main">
                        <div class="rc-profile-image " >
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" 
                                 alt="profile"
                                 id="profileImg"
                                 class="rc-profile-img-hidden" />
                            <span class="rc-profile-change-btn" id="changeBtn">Change</span>
                        </div>
                        <div class="rc-profile-table">
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    User id
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        10000
                                    </div>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    first name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Nimal
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    last name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Kumara
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Display name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Nimal Kumara
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Email
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        nimalkumara5@gmail.com
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Mobile number
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        0705298767
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Update password
                                </div>
                                <div class="rc-profile-right">
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row txt-red">
                                <div class="rc-profile-left">
                                    Delete account
                                </div>
                                <div class="rc-profile-right">
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    </div>
    </section>
</body>



</html>