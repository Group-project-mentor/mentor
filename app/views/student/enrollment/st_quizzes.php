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
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>

<!-- message pop up when click delete button -->
<?php
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "QuizEnd") {
        $message = "You Done Quiz Successfully !. To See Marks Click OK Button.";
        include_once "components/alerts/operationSuccess.php";
    }
}
?>
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
                    <a href="<?php echo BASEURL . 'st_public_resources/index/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <?php
                    $ggid = $_SESSION['gid'] + 5;
                    ?>
                    <h1><?php echo "Grade " . $ggid . " - " . ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / quizzes</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">

                    <div class="rc-resource-table">


                        <section class="quiz-card-list">
                            <?php
                            if (!empty($data[0])) {
                                foreach ($data[0] as $row) {

                            ?>
                                    <div class="quiz-card-main">

                                        <div class="quiz-card-title">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="quiz-card-content">
                                            <div class="quiz-card-item">
                                                <?php echo $row->marks ?> Marks
                                            </div>
                                            <div class="quiz-card-item">
                                                <?php echo $row->questions ?> Questions
                                            </div>
                                        </div>
                                        <div class="quiz-card-button-set">
                                            <a class="quiz-card-btn" href="<?php echo BASEURL . 'st_public_resources/st_quizzes_intro/' . $row->id  ?>" style="text-decoration: none;">
                                                <div class="back-btn">
                                                    Quiz
                                                </div>
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


                <?php if (count($data[0]) > 25) { ?>
                    <div class="pagination-set">
                        <div class="pagination-set-left">
                            <b>25</b> Results
                        </div>
                        <div class="pagination-set-right">
                            <button>
                                < </button>
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