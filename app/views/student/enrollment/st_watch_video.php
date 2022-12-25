<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/st_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL?>assets/clips/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL?>assets/clips/logo1.png" alt="logo" />
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
                
                <a href="<?php echo BASEURL?>st_watch_video" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="Subjects">
                    <div class="nav-link-text">Videos</div>
                </a>
                <a href="<?php echo BASEURL?>st_quizzes" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_quizzes.png" alt="Subjects">
                    <div class="nav-link-text">Quizzes</div>
                </a>
                <a href="<?php echo BASEURL?>st_pastpapers" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_past_papers.png" alt="Subjects">
                    <div class="nav-link-text">Past Papers</div>
                </a>
                <a href="<?php echo BASEURL?>st_documents" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_pdf.png" alt="Subjects">
                    <div class="nav-link-text">PDFs</div>
                </a>
                <a href="<?php echo BASEURL?>st_other" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_other.png" alt="Subjects">
                    <div class="nav-link-text">Other resources</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_settings.png" alt="Subjects">
                    <div class="nav-link-text">Settings</div>
                </a>
                <a href="<?php echo BASEURL?>st_report_main" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_report.png" alt="report">
                    <div class="nav-link-text">Report</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

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
                    <a href="<?php echo BASEURL?>video">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
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
                    <h2>C79 - lesson 1</h2>

                    <div class="subject-card-watching">
                        <img src="<?php echo BASEURL?>assets/patterns/1.png" alt="" />
                    </div>

                    <h2>Description</h2>
                    <p class="Description">
                        We take learning very seriously at Success Tutorial School. <br>
                        We have a special recipe for success and we owe everything to careful preparation. 
                        Just like any good ol’ recipe, it takes the best ingredients, and careful preparation to ensure the best results. 
                        To get our students ready for their lessons at school, we understand who they are, needs and goals. 
                        From there, we carefully craft a program that works for them, not us. 
                        After all, every student is different in their own way and have different goals they want to achieve, and we respect that! 
                        When students see that others’ care about their needs and goals, they automatically become more engaged 
                        and want to learn – when students want to learn, academic results can naturally be seen <br><br>
                        From there, we carefully craft a program that works for them, not us. 
                        After all, every student is different in their own way and have different goals they want to achieve, and we respect that! 
                        When students see that others’ care about their needs and goals, they automatically become more engaged 
                        and want to learn – when students want to learn, academic results can naturally be seen </p>

                    <div>
                        <h3>Related Videos</h3>
                    </div>
                    <div class="subject-card-set">
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