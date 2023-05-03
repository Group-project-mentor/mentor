<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Question</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">
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
                <a href="<?php echo BASEURL . 'quiz/addAnswers/' . $data[0] . '/' . $data[2] ?>">
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
                <h6>My Subjects / Science-6 / Quizzes / <?php echo $data[0] ?> / question <?php echo $data[1][4] ?> / edit answer</h6>
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
                    <form class="quiz-answer-set" action="<?php echo BASEURL . 'quiz/editAnswerAction/' . $data[0] . '/' . $data[2] . '/' . $data[1][0] ?>" method="POST">
                        <div class="rc-form-group">
                            <div class="answer-option-set">
                                <h2>Answer</h2>
                            </div>
                            <div class="answer-correctness-btn">
                                <input type="checkbox" name="correct" id="quiz-answer-radio" value="correct" <?php echo ($data[1][3] == 1) ? "checked" : "" ?> />
                                <label for="quiz-answer-radio">Correct</label>
                            </div>
                            <textarea placeholder="Enter your Answer" name="answer" id="ansTxt" rows="4"><?php echo $data[1][2] ?></textarea>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="rc-ans-image-input" id="ansImage" name="ansImg" value="<?php echo $data[1][5] ?>"/>
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <button type="submit" class="rc-quiz-button green" id="addAnsBtn">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
    </div>
</section>
</body>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        }

        else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })
</script>

<script src="<?php echo BASEURL ?>javascripts/addQuestion.js"></script>

</html>