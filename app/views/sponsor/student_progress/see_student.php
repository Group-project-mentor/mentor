<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Student</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php" ?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL ?>sponsor/allStudents">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Student Program</h1>
                <h2>Student Profile</h2>
            </div>

            <!-- bottom part -->
            <section class="bottom-section-grades" style="flex-direction: column;align-items:center;">
                <div class="sponsor-student-prof">
                    <div class="prof">
                        <div class="image">
                            <?php if(empty($data[0]->image)){ ?>
                                <img src="<?php echo BASEURL ?>assets/clips/no_profile.jpg">
                            <?php }else{ ?>
                                <img src="<?php echo $data[0]->image ?>">
                            <?php } ?>
                        </div>
                        <div class="details">
                            <h3>Student Details</h3>
                            <div class="sponsor-list-main" style="padding: 20px">
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        ID :
                                    </div>
                                    <div class="sponsor-list-item flex-3 sponsor-detail-cell">
                                        <?php echo $data[0]->id ?>
                                    </div>
                                </div>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        Name :
                                    </div>
                                    <div class="sponsor-list-item flex-3 sponsor-detail-cell">
                                        <?php echo $data[0]->name ?>
                                    </div>
                                </div>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        Grade :
                                    </div>
                                    <div class="sponsor-list-item flex-3 sponsor-detail-cell">
                                    <?php if(!empty($data[1])){
                                        foreach ($data[1] as $row){ 
                                            echo "Grade ".$row->grd;
                                        }
                                        }else{ 
                                            echo "No Grade";
                                        } ?>
                                    </div>
                                </div>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                        Age :
                                    </div>
                                    <div class="sponsor-list-item flex-3 sponsor-detail-cell">
                                        <?php echo $data[0]->id ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-details">
                        <h3>More Details</h3>
                        <div>
                            <div class="sp-subject-details">
                                <h4>Subjects</h4>
                                <div class="sponsor-list-main border-no">
                                
                                    <?php
                                    if(!empty($data[1])){
                                        foreach ($data[1] as $row){ ?>

                                            <div class="sponsor-list-row">
                                                <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                    <?php echo $row->sub ?>
                                                </div>
                                            </div>

                                        <?php }
                                    }else{ ?>
                                        <div class="sponsor-list-row">
                                                <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                    No Subjects
                                                </div>
                                            </div>
                                   <?php  } ?>
                                </div>
                            </div>
                            <div class="sp-subject-report">
                                <h4>Detail Chart</h4>
                                <img src="<?php echo BASEURL?>assets/clips/chart.webp" style="width: 400px;">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </div>
</section>

</body>

</html>

