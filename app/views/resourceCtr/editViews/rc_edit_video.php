
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Video</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>

    <?php
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "update_err") {
            include_once "components/alerts/video_alerts/video_update_err.php";
        } elseif ($_SESSION['message'] == "url_err") {
            include_once "components/alerts/video_alerts/video_url_err.php";
        } elseif ($_SESSION['message'] == "empty_err") {
            include_once "components/alerts/video_alerts/video_empty_err.php";
        } elseif ($_SESSION['message'] == "success") {
            include_once "components/alerts/video_alerts/video_update_success.php";
        }
    }
    ?>

    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_2.php" ?>

        <div class="content-area">

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
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / video / add </h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>EDIT VIDEO</h1>
                    </div>
                </div>
                <?php if(!empty($data[0])){ ?>
                <div class="rc-upload-box">
                    <form action="<?php echo BASEURL.'rcEdit/editVideo/'.$data[0][0]?>" method="POST" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Edit Video
                        </div>
                        <div class="rc-form-group">
                            <label> Edit title : </label>
                            <input type="text" name="title" placeholder="title" value="<?php echo $data[0][1]?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Lecturer : </label>
                            <input type="text" name="lec" placeholder="lecturer or source" value="<?php echo $data[0][2]?>"/>
                        </div>
                        <div class="rc-form-group">
                            <iframe src="<?php echo $data[0][4]?>" frameborder="0"></iframe>
                            <label> Video link :  </label>
                            <input type="text" name="link" placeholder="video link" value="<?php echo $data[0][4]?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Video Description :  </label>
                            <textarea class="rc-video-descr" placeholder="Description" name="descr" ><?php echo $data[0][3]?></textarea>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" >Update</button>
                        </div>
                        
                    </form>
                </div>
                <?php }else{ ?>
                    <div style="text-align: center;font-size: x-large;color: darkred;">
                        <br>
                        You are not authorized to do this action !
                    </div>
                <?php } ?>
        </div>

    </section>
</body>
<script>
     
</script>
</html>