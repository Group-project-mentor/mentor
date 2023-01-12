<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<section class="page">
    
    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
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
                <h1>Grade 6 - Science</h1>
                <h2>Create Quiz</h2>
                <h6>My Subjects / Science - 6 / Quiz / Create</h6>
            </div>

            <!-- Content area -->
            <div class="container-box quiz-box">
                <form action="<?php echo BASEURL ?>quiz/createAction" method="POST">
                    <div class="rc-form-group">
                        <label for="quiz_name" class="rc-form-label">
                            Quiz Name :
                        </label>
                        <input type="text"
                               name="quiz_name"
                               id="quizName"
                               class="rc-form-input"
                               placeholder="Ex : Test 1"/>
                    </div>

                    <div class="rc-form-group">
                        <label for="tot_mark" class="rc-form-label">
                            Total Marks :
                        </label>
                        <input type="text"
                               name="tot_mark"
                               id="tot_mark"
                               class="rc-form-input"
                               placeholder="Ex : 100"/>
                    </div>

                    <div class="rc-form-group">
                        <button type="submit" class="rc-quiz-button green">
                            Next
                        </button>
                    </div>
                </form>
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

</html>

