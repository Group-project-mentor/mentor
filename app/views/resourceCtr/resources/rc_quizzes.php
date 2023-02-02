<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>
    <?php 
        if($data[1] == "dper"){
            include_once "components/alerts/no_permission.php"; 
        }
        // elseif($data[1] == "failed"){
        //     include_once "components/alerts/res_update_failed.php"; 
        // }
    ?>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>rcSubjects">
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
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / quizzes</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>QUIZZES</h1>
                        <a href="<?php echo BASEURL?>quiz/create">
                            <div class="rc-add-btn">
                                Add Quiz
                            </div>
                        </a>
                    </div>

                    <section class="quiz-card-list">
                        <?php
                        if(!empty($data[0])){
                        foreach ($data[0] as $row) { ?>
                        <div class="quiz-card-main">
                            <div class="quiz-card-title">
                                <?php echo $row['name'] ?>
                            </div>
                            <div class="quiz-card-content">
                                <div class="quiz-card-item">
                                    <?php echo $row['marks'] ?> Marks
                                </div>
                                <div class="quiz-card-item">
                                    10 Questions
                                </div>
                            </div>
                            <div class="quiz-card-button-set">
                                <a class="quiz-card-btn" onclick='delConfirm(<?php echo $row['id']?>,2)'>
                                    <img src='<?php echo BASEURL."assets/icons/icon_delete.png" ?>' alt=''>
                                </a>
                                <a class="quiz-card-btn" href="<?php echo BASEURL.'quiz/questions/'.$row['id'] ?>">
                                    <img src='<?php echo BASEURL."assets/icons/icon_edit.png" ?>' alt=''>
                                </a>
                                <a class="quiz-card-btn" href="<?php echo BASEURL.'quizPreview/question' ?>">
                                    <img src='<?php echo BASEURL."assets/icons/icon_eye.png" ?>' alt=''>
                                </a>
                            </div>
                        </div>
                        <?php        }
                        }
                        ?>
                    </section>
                </div>
            </div>
    </section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>