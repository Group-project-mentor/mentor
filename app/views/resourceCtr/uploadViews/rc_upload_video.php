
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php
        if(isset($_SESSION['message']) && $_SESSION['message']== "success"){
            include_once "components/alerts/uploadSuccess.php";
        }elseif (isset($_SESSION['message']) && $_SESSION['message'] == "fillAllData"){
            $message = "Please fill required data !";
            include_once "components/alerts/operationFailed.php";
        }elseif(isset($_SESSION['message']) && $_SESSION['message']== "error"){
            include_once "components/alerts/uploadFailed.php";
        }elseif(isset($_SESSION['message']) && $_SESSION['message']== "dataNotFilled"){
            $message = "Link or name is not valid !";
            include_once "components/alerts/operationFailed.php";
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
                    <a href="<?php echo BASEURL .'rcResources/videos/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
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
                        <h1>ADD VIDEO</h1>
                    </div>
                </div>
                <div class="rc-upload-box">
                    <form action="<?php echo BASEURL.'rcAdd/addVideo'?>" method="POST" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Upload Video
                        </div>
                        <div class="rc-form-group">
                            <label> Add title : </label>
                            <input type="text" name="title" placeholder="title"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Lecturer : </label>
                            <input type="text" name="lec" placeholder="lecturer or source"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Video link :  </label>
                            <input type="text" name="link" placeholder="video link"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Video Description :  </label>
                            <textarea class="rc-video-descr" placeholder="Description" name="descr"></textarea>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200">Add Video</button>
                        </div>
                        
                    </form>
                </div>
        </div>

    </section>
</body>
<script>
     
</script>
</html>