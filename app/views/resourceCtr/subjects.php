<?php
// session_start();
if (!isset($_SESSION['user'])) {
    header("location:" . BASEURL . "login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_card_set.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'home' ?>">
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
                    <h1>My Subjects</h1>
                    <h6><?php echo $_SESSION["name"] ?></h6>
                </div>

                <!-- subject cards -->
                <div class="container-box">
                    <div class="subject-card-set">

                        <?php
                            if(!empty($data)){
                                foreach ($data as $row) {
                                    echo "<div class='subject-card'>
                                                <img src='assets/patterns/1.png' alt='' />
                                                <a href='".BASEURL."resources/videos/".$row['gid']."/".$row['sid']."'><label>".$row['sname']." </label></a>
                                                <label>".$row['gname']."</label>
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