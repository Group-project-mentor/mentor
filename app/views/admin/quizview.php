<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <!-- <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css"> -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_quizview.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/massage.css">

</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/public/components/alerts/admin/resources_add.php"); ?>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="ad_mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
            <h1>Quizz ID - <?php echo $data['quizv'][0]['id'] ?></h1>

        </div>
        <div class="content">
            <div class="quiz-preview-container">

                <hr />
                <div class="quiz-preview-question">
                    <!--questions-->

                    <?php if (isset($data['questions']) && is_array($data['questions'])) : ?>
                        <?php foreach ($data['questions'] as $question) : ?>
                            <div class="quiz-preview-question">
                                <p>Q -<?php echo $question['number'] . ") " . $question['description'] ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?><p>No questions found.</p>
                    <?php endif; ?>


                </div>
            </div>
        </div>

        <div class="content">
            <?php
            echo '<div class="content" id="comp-content">
            <div class="btns">
                <button class="comp-btns" onclick="approve(\'' . $data['quizv'][0]['id'] . '\')" type="button">Approve</button>
                <button class="comp-btns" onclick="decline(\'' . $data['quizv'][0]['id'] . '\')" type="button">Decline</button>
            </div>
            </div>';

            ?>

        </div>

    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>
</body>

<script src="<?php echo BASEURL ?>javascripts/admin/cors.js"></script>

<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    // let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            // navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            // navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })

    const profileBtn = document.getElementById("profile-btn");
    const popupMenu = document.getElementById("popup-menu")
    let toggler = false;

    profileBtn.addEventListener('click', () => {
        if (toggler) {
            popupMenu.style.display = "none";
            toggler = false

        } else {
            popupMenu.style.display = "flex";
            toggler = true
        }
    })
</script>

</html>