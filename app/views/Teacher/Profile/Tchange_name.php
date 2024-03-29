<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>change image</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_resources.css">
    <style>
        .rc-profile-change-name{
            max-width: 800px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 50px;
        }
        .rc-profile-change-name button{
            padding: 10px 20px;
        }
        .rc-profile-change-name input{
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    if (!empty($data) && $data == "failed") {
        include_once "components/alerts/data_change_failed.php";
    }
    ?>
    
    <section class="page">


        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php"?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>Tprofile">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Profile - Change Name</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>

                <form class="rc-profile rc-profile-change-name" method="POST" action="<?php echo BASEURL ?>TProfile/changeName">
                    <div class="rc-text-inp-grp">
                        <label for="name" class="lbl-input">Name : </label><br>
                        <input 
                            type="text" 
                            class="txt-input" 
                            placeholder="New Name" 
                            value="<?php echo $_SESSION['name'] ?>" 
                            name="name" 
                            pattern="[A-Za-z0-9][A-Za-z0-9 ]+"
                            title="Invalid name !"    />
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