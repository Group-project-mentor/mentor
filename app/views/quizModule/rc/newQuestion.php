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
    <?php include_once "components/navbars/rc_nav_2.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL."quiz/questions/".$data[0]?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php"?>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>C79 - Science</h1>
                <h6>My Subjects / Science-6 / Quiz / Create</h6>
            </div>

            <!-- Grade choosing interface -->
            <form class="container-box" method="POST" action="<?php echo BASEURL."quiz/saveQuestion/".$data[0]?>" enctype="multipart/form-data">
                <div class="rc-resource-header">
                    <h1>TEST 1</h1>
                    <div class="rc-quiz-top-btns">
                        <button type="submit" name="submit" class="rc-add-btn" id="quiz-save-btn">
                            Save
                        </button>
                    </div>
                </div>

                <div  class="quiz-container" >

                    <div class="rc-form-group">
                        <label for="quizName" class="rc-form-label">
                            Question :
                        </label>
                        <textarea placeholder="Enter your question" name="question" id="questionTxt" rows="7"></textarea>
                    </div>

                    <div class="rc-form-group">
                        <label for="quizName" class="rc-form-label">
                            Image :
                        </label>
                        <input type="file" class="rc-quiz-image-input" id="questionImg" > 
                    </div>
                    <br>
                    <div id="image-preview" style="display: none;flex-direction:column;">
                        <label for="quizName" class="rc-form-label">
                            Image preview:
                        </label>
                        <img src="" alt="" id="image_tag" >
                    </div>

<!--                    <input type="hidden" name="ques_img" value="" id="image_data">-->

                </div>
            </form>
    </div>
</section>
</body>

<script src="<?php echo BASEURL?>javascripts/quiz_image_process.js"></script>

</html>