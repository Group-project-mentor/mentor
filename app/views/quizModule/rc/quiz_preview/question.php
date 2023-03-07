<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Questions</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>

<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>


    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL."quizPreview/instructions/".$data[0] ?> ?>">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="quiz-preview-content">

            <!-- Title and subtitle of middle part -->
<!--            <div class="mid-title">-->
<!--                <h1></h1>-->
<!--                <h6></h6>-->
<!--            </div>-->

            <!-- Grade choosing interface -->
            <div class="quiz-preview-container-box">
                <div class="rc-resource-header">
                    <h1>TEST 1</h1>
<!--                    <div class="rc-quiz-top-btns">-->
<!--                        <a class="rc-add-btn" id="quiz-save-btn">-->
<!--                            Edit Question-->
<!--                        </a>-->
<!--                    </div>-->

                </div>

                <div  class="quiz-preview-container" >
                    <h2 id="question-number"></h2>
                    <hr />
                    <div class="quiz-preview-question" >
                        <img src="" alt="" id="question-img">
                        <p id="question-name"></p>
                    </div>
                    <div class="quiz-preview-answer-set" id="answer-set"></div>
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
    </div>
</section>
</body>

<script>

    const baseURL = '<?php echo BASEURL?>';
    let quizId = <?php echo $data[0]?>;

</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_quiz_preview.js' ?>"></script>
</html>