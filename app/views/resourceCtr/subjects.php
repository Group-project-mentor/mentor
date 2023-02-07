<?php
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
    <title>RC-Subjects</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
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
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
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
                                $count = 1;
                                foreach ($data as $row) {
                                    ?>
                                    <div class='subject-card'>
                                        <div class="subject-card-inside">
                                            <img src='<?php echo BASEURL?>assets/patterns/<?php echo $count ?>.png' alt='' />
                                            <div>
                                                <label class="subject-card-texts"><?php echo ucfirst($row['sname']) ?> </label>
                                                <label class="subject-card-texts">Grade  <?php echo $row['gname'] ?> </label>
                                            </div>
                                        </div>

                                        <a href='<?php echo BASEURL."rcResources/videos/".$row['gid']."/".$row['sid'] ?>'>
                                            <label>Enter</label>
                                            <img src='<?php echo BASEURL?>assets/icons/icon-enter.png' alt='' />
                                        </a>
                                    </div>
                    <?php           $count++;
                                    if($count>12) $count = 1;
                                }
                            }
                        ?> 
                                    
                                
                        
                    </div>
                </div>

        </div>

    </section>
</body>

</html>