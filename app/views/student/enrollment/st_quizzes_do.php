<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Quizzes</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/quiz/quiz_styles.css">
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
                    <a href="<?php echo BASEURL . 'st_public_resources/st_quizzes_intro/' . $_SESSION['gid'] . '/' . $_SESSION['qname'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2><?php echo ucfirst($_SESSION['sname']) ?>
                        - <?php echo ucfirst($_SESSION['qname']) ?></h2>
                    <br>
                    <hr style=" height:5px ; background-color:green ;">
                    <br>

                    <!-- quiz navigation bars -->
                    <div class="quiz-preview-container">
                        <h2 id="question-number"></h2>
                        <hr />
                        <div class="quiz-preview-question">
                            <img src="" alt="" id="question-img">
                            <p id="question-name">
                                <?php
                                if (!empty($data[1])) {
                                    foreach ($data[1] as $row) {

                                ?>
                                    <?php echo $row->number . '. ' . $row->description; ?> <br>

                                <?php        }
                                } ?>
                            </p>
                        </div>
                        <div class="quiz-preview-answer-set" id="answer-set">
                            helllllo
                        </div>
                        <hr />
                        <div class="quiz-preview-bottom-set">
                            <button class="quiz-preview-bottom-button" id="back-btn">
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon_prev_white.png" alt="">
                                Back
                            </button>
                            <progress value="0.3" id="quiz-progress"></progress>
                            <button class="quiz-preview-bottom-button" id="next-btn">
                                Next
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon_next_white.png" alt="">
                            </button>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script>
    const baseURL = '<?php echo BASEURL ?>';
    let quizId = <?php echo $data[0] ?>;
</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_quiz_preview.js' ?>"></script>

</html>