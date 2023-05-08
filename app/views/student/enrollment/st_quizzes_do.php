<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Questions</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">
    <style>
        .wrapper {
            margin: auto;
            padding-top: 50px;
            display: flex;
            justify-content: space-between;
            width: 80%;
        }

        .box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            background-color: #f8f8f8;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .left-box {
            margin-right: 10px;
        }

        .right-box {
            margin-left: 10px;
        }

        .middle-box {
            margin-left: 10px;
        }
    </style>
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
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="quiz-preview-content">


                <!-- Grade choosing interface -->
                <div class="quiz-preview-container-box">
                    <div class="rc-resource-header">
                        <h1> <?php echo $data[0][0]->name ?></h1>
                    </div>

                    <div class="wrapper">
                        <div class="box left-box">
                            <span>Current Question : </span>
                            <h3 id="currect-question"></h3>
                        </div>
                        <div class="box middle-box">
                            <span>Total Questions : </span>
                            <h3 >5</h3>
                        </div>
                        <div class="box right-box">
                            <span>Current Marks : </span>
                            <h3 id="current-marks"></h3>
                        </div>
                    </div>


                    <div class="quiz-preview-container">
                        <h2 id="question-number"></h2>
                        <hr />
                        <div class="quiz-preview-question">
                            <img src="" alt="" id="question-img">
                            <p id="question-name"></p>
                        </div>
                        <div class="quiz-preview-answer-set" id="answer-set"></div>
                        <hr />
                        <div class="quiz-preview-bottom-set">
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
    const baseURL = '<?php echo BASEURL ?>';
    let quizId = <?php echo $data[2] ?>;
</script>
<script src="<?php echo BASEURL . '/public/javascripts/st_quiz_do.js?v=1.3' ?>"></script>

</html>