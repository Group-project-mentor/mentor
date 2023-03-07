<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Quizzes</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?> <!-- used to include_once to add file -->


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
                    <a href="<?php echo BASEURL . 'st_video/index/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <?php
                    $ggid = $_SESSION['gid'] + 5;
                    
                    // add grade to path printing 
                    if($_SESSION['sid'] == 1)         
                        $ssid = 'Mathematics' ; ?>
                    <h1><?php echo "Grade ".$ggid." - ".ucfirst($ssid) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sid']) ?> / quizzes</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">

                    <div class="rc-resource-table">
                        <div class="rc-resource-row rc-resource-row-head">
                            <div class="rc-resource-col">Quiz Name</div>
                            <div class="rc-resource-col">Part</div>

                            <div></div>
                        </div>
                        <!-- temporary date hard code -->

                        <!-- <div class="rc-resource-row">
                            <div class="rc-resource-col">Genaral </div>
                            <div class="rc-resource-col">1</div>
                            <div class="rc-quiz-row-btns">
                                
                                <a href="<?php echo BASEURL ?>st_quizzes/st_quizzes_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <button>
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_edit.png" alt="">
                                </button>
                            </div>
                        </div> -->

                        <section class="quiz-card-list">
                            <?php
                            if (!empty($data[0])) {
                                foreach ($data[0] as $row) {
                                    $approval = $this->approvedGenerator($row->approved);
                            ?>
                                    <div class="quiz-card-main">
                                        <div style="position: absolute;left: 3px;bottom: 3px;">
                                            <img src='<?php echo BASEURL . "assets/icons/" . $approval ?>' alt='' class="resource-approved-sign">
                                        </div>
                                        <div class="quiz-card-title">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="quiz-card-content">
                                            <div class="quiz-card-item">
                                                <?php echo $row->marks ?> Marks
                                            </div>
                                            <div class="quiz-card-item">
                                                10 Questions
                                            </div>
                                        </div>
                                        <div class="quiz-card-button-set">
                                            <?php if ($this->isCreatedBy($row->creator_id)) { ?>

                                                <a class="quiz-card-btn" onclick='delConfirm(<?php echo $row->id ?>,2)'>
                                                    <img src='<?php echo BASEURL . "assets/icons/icon_delete.png" ?>' alt=''>
                                                </a>
                                                <a class="quiz-card-btn" href="<?php echo BASEURL . 'quiz/questions/' . $row->id ?>">
                                                    <img src='<?php echo BASEURL . "assets/icons/icon_edit.png" ?>' alt=''>
                                                </a>

                                            <?php } ?>
                                            <a class="quiz-card-btn" href="<?php echo BASEURL . 'quizPreview/instructions/' . $row->id ?>">
                                                <img src='<?php echo BASEURL . "assets/icons/icon_eye.png" ?>' alt=''>
                                            </a>
                                        </div>
                                    </div>
                                <?php        }
                            } else { ?>
                                <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                            <?php } ?>
                        </section>



                    </div>

                </div>

                
                <?php if(count($data[0]) > 25){ ?>
                <div class="pagination-set">
                    <div class="pagination-set-left">
                        <b>25</b> Results
                    </div>
                    <div class="pagination-set-right">
                        <button> < </button>
                        <div class="pagination-numbers">
                            1 of 10
                        </div>
                        <button> > </button>
                    </div>
                </div>
                <?php } ?>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>