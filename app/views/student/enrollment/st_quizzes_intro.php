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
                    <a href="<?php echo BASEURL . 'st_public_resources/index_quizzes/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="quiz-preview-content">
                <div class="quiz-preview-container-box">
                    <div class="rc-resource-header">
                        <h1>QUIZ INSTRUCTIONS</h1>
                        <h2><?php $_SESSION["gid"] ?></h2>
                    </div>

                    <div class="quiz-preview-container">
                        <h2 id="question-number"></h2>
                        <hr />
                        <div class="quiz-preview-question" >
                            <h3 id="question-number">Please Read the Instructions First</h3>
                            <p id="question-name">
                                <b> (+)</b> This quiz has a set number of questions that can be previewed before starting the quiz in quiz selecting page.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> Each question is worth one mark and the final score is calculated out of 100. 
                                Each question has four answer choices, and only one of them is correct.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> Once you click on an answer choice, it will be highlighted in green if it is correct and in red if it is wrong.
                                You cannot change your answer, so be careful.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> There is no back button to go to the previous question. You can only go to the next question.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> There are no answer result descriptions, but you can see your marks and the current question number on the top of the page.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> Once you complete the quiz, a pop-up message will appear. Click "OK" and it will take you back to the first page where all the quizzes are shown.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> If you enroll in the same quiz again, after the pass instruction page, you will be able to see your final marks.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> Once you complete the quiz, you will not be able to access it again. However you Enter the Quiz it will show only your marks.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> If you leave in the middle of the quiz, the system will remember the last question you did along with your current marks.
                            </p>
                            <p id="question-name">
                                <b> Good luck with your quiz ! </b> 
                            </p>
                            <div class="quiz-preview-bottom-set" style="justify-content: flex-end;">
                                <a class="quiz-preview-bottom-button" href="<?php echo BASEURL . 'st_public_resources/st_quizzes_do/' . $data[0] ?>">
                                    Start OR View Marks
                                    <img src="<?php echo BASEURL ?>assets/icons/icon_next_white.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>

</html>