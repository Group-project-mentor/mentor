<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/st_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL?>st_courses">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL?>st_profile">
                        <img src="<?php echo BASEURL?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Subjects</h1>
                    <h6>Hello </h6>
                </div>

                
                <!-- subject cards -->
                <div class="container-box">
                    <div>
                        <h2>Grade 9 - C79 - Science</h2>
                    </div>
                    <div class="subject-card-set">
                        <div class="subject-card">
                            <img src="<?php echo BASEURL?>assets/patterns/1.png" alt="" />
                            <a href="#"><label>C79 - lesson 1</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn"><a href="<?php echo BASEURL?>st_video" style="color:white ;">Enter</a></button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL?>assets/patterns/2.png" alt="" />
                            <a href="#"><label>C79 - lesson 2</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn">Enter</button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C79 - lesson 3</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn">Enter</button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C79 - lesson 4</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn">Enter</button>
                        </div>
                        <div class="subject-card">
                            <img src="<?php echo BASEURL?>assets/patterns/3.png" alt="" />
                            <a href="#"><label>C79 - lesson 5</label></a>
                            <label>Grade 8</label>
                            <button class="Enter-btn">Enter</button>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </section>
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