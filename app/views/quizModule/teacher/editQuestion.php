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
                <a href="<?php echo BASEURL."TQuiz/questions/".$data[0]?>">
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
                <h6>My Subjects / Science-6 / Quiz / Create</h6>
            </div>

            <!-- Grade choosing interface -->
            <form class="container-box" method="POST" action="<?php echo BASEURL."TQuiz/saveQuestion/".$data[0]?>">
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
                        <input type="file" name="ques_img" class="rc-quiz-image-input" id="questionImg">
                    </div>

                </div>
            </form>
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

<!--<script src="--><?php //echo BASEURL?><!--javascripts/addQuestion.js"></script>-->

</html>