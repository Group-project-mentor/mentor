<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/st_resources.css">
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
                
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="Subjects">
                    <div class="nav-link-text">Videos</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_quizzes.png" alt="Subjects">
                    <div class="nav-link-text">Quizzes</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_past_papers.png" alt="Subjects">
                    <div class="nav-link-text">Past Papers</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_pdf.png" alt="Subjects">
                    <div class="nav-link-text">PDFs</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_other.png" alt="Subjects">
                    <div class="nav-link-text">Other resources</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_settings.png" alt="Subjects">
                    <div class="nav-link-text">Settings</div>
                </a>
                <a href="#" class="nav-link">
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
                    <a href="<?php echo BASEURL?>st_watch_video">
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
                    <h1>Document</h1>
                    <h6>Hello</h6>
                    <br>
                    <h2>C79 - Science</h2>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">

                    <div class="rc-resource-table">
                        <div class="rc-pp-row rc-pp-row-head" >  
                            <div class="rc-resource-col">PDF Name</div>
                            <div class="rc-resource-col">year</div>
                            <div class="rc-resource-col">Part</div>
                            <div></div>
                        </div>

                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 1</div>
                            <div class="rc-resource-col">Lesson 1</div>
                            <div class="rc-resource-col">1</div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/View_1_by_Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 2</div>
                            <div class="rc-resource-col">Lesson 2</div>
                            <div class="rc-resource-col">2</div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/View_1_by_Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 3</div>
                            <div class="rc-resource-col">Lesson 3</div>
                            <div class="rc-resource-col">3</div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/View_1_by_Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </button>
                            </div>
                        </div>

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

</html>