<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>change Password</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_resources.css">
    <style>
        .rc-profile-change-name{
            max-width: 800px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 50px;
            padding: 30px 40px;
            border: 4px solid #77777777;
            border-radius: 10px;
        }
        .rc-profile-change-name button{
            padding: 10px 20px;
        }
        .rc-profile-change-name input{
            text-align: center;
        }
        .txt-input{
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    
    <?php 
        if(!empty($data) && $data == "failed"){
            include_once "components/alerts/pwd_change_failed.php"; 
        }
        elseif(!empty($data) && $data == "wrongPass"){
            include_once "components/alerts/pwd_wrong.php"; 
        }
    ?>

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
                    <h1>Profile - Change Password</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>

                <form class="rc-profile rc-profile-change-name" method="POST" action="<?php echo BASEURL ?>rcProfile/changePassword">
                    <div class="rc-text-inp-grp">
                        <label for="password" class="lbl-input">Current Password : </label>
                        <input type="password" class="txt-input" placeholder="Current password"  name="cpasswd" />
                    </div><br>
                    <div class="rc-text-inp-grp">
                        <label for="password" class="lbl-input">New Password : </label>
                        <input type="password" class="txt-input" placeholder="New Password"  name="npasswd" 
                                pattern="[0-9a-zA-Z]{8}"
                                title="password should not be empty" />
                    </div>
                    <div class="rc-text-inp-grp"> 
                        <label for="password" class="lbl-input">Confirm New Password : </label>
                        <input type="password" class="txt-input" placeholder="New Password"  name="cnfpasswd" 
                                pattern="[0-9a-zA-Z]{8}"
                                title="password should not be empty"/>
                    </div>
                    <button type="submit" class="rc-add-btn">Change</button>
                </form>
            </section>

        </div>
    </section>
    </div>
    </section>
</body>

<script>

</script>

</html>