<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
<?php include_once "components/alerts/rc_delete_alert.php"?>

<?php
$category = "documents";
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        include_once "components/alerts/categoryUploadSuccess.php";
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
                <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
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
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / resources</h6>
            </div>

            <!--  -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>RESOURCES</h1>
                    <a href="<?php echo BASEURL . 'rcAdd/document' ?>">
                        <div class="rc-add-btn">
                            Add
                        </div>
                    </a>
                </div>
                <div class="rc-resource-table">

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                        <div class="rc-resource-col">
                            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Announcement</h1>
                        </div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <div class="rc-resource-header">
                        <h3>Lesson 1</h3>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                        <div class="rc-resource-col">
                            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Forum</h1>
                        </div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_zoom.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Zoom session link</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/pdf_resources.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Slides pdf</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_video_teacher.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Lesson video</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="rc-resource-header">
                        <h3>Lesson 2</h3>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                        <div class="rc-resource-col">
                            <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Forum</h1>
                        </div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_zoom.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Zoom session link</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/pdf_resources.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Slides pdf</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                    <div class="rc-pp-row">

                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_video_teacher.png" alt="delete">
                        <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Lesson video</div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-resource-col"></div>
                        <div class="rc-quiz-row-btns">
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                            </button>
                            <button>
                                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                            </button>
                        </div>
                    </div>

                </div>
                </div>
            </div>
</section>
</body>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>
</html>