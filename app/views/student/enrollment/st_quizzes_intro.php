<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz Introduction</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>


    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?>


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'st_quizzes/index/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="quiz-preview-content">
                <div class="quiz-preview-container-box">
                    <div class="rc-resource-header">
                        <h1>QUIZ INSTRUCTIONS</h1>
                    </div>

                    <div class="quiz-preview-container">
                        <h2 id="question-number"></h2>
                        <hr />
                        <div class="quiz-preview-question">
                            <h3 id="question-number">Please Read the Instructions First</h3>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a <i>list view</i> is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the <b> most common </b> uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                                echo $id;
                            </p>
                            <!-- <?php echo $row->id ?> -->
                            <div class="quiz-preview-bottom-set" style="justify-content: flex-end;">
                                <a class="quiz-preview-bottom-button" href="<?php echo BASEURL . 'st_quizzes/st_quizzes_do/85' ?>">
                                    Start
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next_white.png" alt="">
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
        </div>
    </section>
</body>

</html>