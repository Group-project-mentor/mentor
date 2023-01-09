<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Question</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <nav class="nav-bar" id="nav-bar">

        <!-- Navigation bar logos -->
        <div class="nav-upper">
            <div class="nav-logo-short">
                <img src="<?php echo BASEURL?>public/assets/logo2.png" alt="logo" />
            </div>
            <div class="nav-logo-long" id="nav-logo-long">
                <img src="<?php echo BASEURL?>public/assets/logo1.png" alt="logo" />
            </div>
        </div>


        <!-- Navigation bar private - public switch -->
        <div class="nav-middle" id="nav-middle">
            <p>Public</p>
            <div class="nav-switch">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
            <p class="nav-switch-txt">Private</p>
        </div>


        <!-- Navigation buttons -->
        <div class="nav-links">
            <a href="#" class="nav-link">
                <img class="active" src="<?php echo BASEURL?>public/assets/icons/icon_video.png" alt="home">
                <div class="nav-link-text">Video</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_quizzes.png" alt="cource">
                <div class="nav-link-text">Quizzes</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_past_papers.png" alt="profile">
                <div class="nav-link-text">Past papers</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_pdf.png" alt="report">
                <div class="nav-link-text">PDF</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_other.png" alt="bmc">
                <div class="nav-link-text">Other resource</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_settings.png" alt="report">
                <div class="nav-link-text">Settings</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_report.png" alt="bmc">
                <div class="nav-link-text">Report issue</div>
            </a>
        </div>

        <!-- Navigation bar toggler -->
        <div class="nav-toggler" id="nav-toggler">
            <img src="<?php echo BASEURL?>public/assets/icons/toggler.png" alt="toggler">
        </div>
    </nav>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL."quiz/questions/".$data[0]?>">
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
            <form class="container-box" method="POST" action="<?php echo BASEURL."quiz/saveQuestion/".$data[0]?>">
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