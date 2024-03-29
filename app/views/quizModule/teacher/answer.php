<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Question</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/t_navbar_3.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL.'TQuiz/addAnswers/'.$data[0].'/'.$data[1] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>C79 - Science</h1>
                <h6>My Subjects / Science-6 / Quizzes / <?php echo $data[0]?> / question <?php echo $data[1]?> / add answer</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>TEST 1</h1>
                    <div class="rc-quiz-top-btns">
                        <a class="rc-add-btn" id="quiz-save-btn">
                            Edit Question
                        </a>
                    </div>
                </div>

                    <div  style="margin-top:30px;" class="quiz-answer-main quiz-ans-popup" id="ansBox">
                    <form class="quiz-answer-set" action="<?php echo BASEURL.'TQuiz/saveAnswer/'.$data[0].'/'.$data[1] ?>" method="POST">
                        <div class="rc-form-group">
                            <div class="answer-option-set">
                                <h2>Answer</h2>
<!--                                    <a href="--><?php //echo BASEURL.'quiz/addAnswers/'.$data[0] ?><!--">-->
<!--                                        Go Back-->
<!--                                    </a>-->
                            </div>
                            <div class="answer-correctness-btn">
                                <input type="checkbox" name="correct" id="quiz-answer-radio" value="correct" />
                                <label for="quiz-answer-radio">Correct</label>
                            </div>
                            <textarea placeholder="Enter your Answer" name="answer" id="ansTxt" rows="4"></textarea>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="rc-ans-image-input" id="questionImg"/>
                        </div>
                        <br>
                    <div id="image-preview" style="display: none;flex-direction:column;">
                        <label for="quizName" class="rc-form-label">
                            Image preview:
                        </label>
                        <img src="" alt="" id="image_tag" style="margin: 0 20px;">
                    </div>

                    <input type="hidden" name="ansImg" value="" id="image_data">

                            <div style="display: flex;justify-content: center;">
                                <button type="submit" class="rc-quiz-button green" id="addAnsBtn">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
</section>
</body>

<script src="<?php echo BASEURL?>javascripts/quiz_image_process.js"></script>

</html>