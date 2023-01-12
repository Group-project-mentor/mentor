<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-classroom inside</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/t_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL; ?>assets/clips/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL; ?>assets/clips/logo1.png" alt="logo" />
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
                    <img src="<?php echo BASEURL; ?>assets/icons/icon_resources.png" alt="cource">
                    <div class="nav-link-text">Resources</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL; ?>assets/icons/generate_report.png" alt="bmc">
                    <div class="nav-link-text">See Reports</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL; ?>assets/icons/forum.png" alt="report">
                    <div class="nav-link-text">Use Forum</div>
                </a>
                <a href="<?php echo BASEURL ?>st_report_from_grade.php" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
                    <div class="nav-link-text"> Report Issue</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/Settings" alt="bmc">
                    <div class="nav-link-text">Settings</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL; ?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C136 - Science Grade 8</h1>
                    <h6>Student Home / C136</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h3>General</h3>
                        
                    </div>

                    <div class="rc-resource-table">

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Announcement</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <br>

                        <div class="rc-resource-header">
                            <h3>Lesson 1</h3>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Forum</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_zoom.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Zoom session link</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Slides pdf</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_video_teacher.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Lesson video</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <div class="rc-resource-header">
                            <h3>Lesson 2</h3>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Forum</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_zoom.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Zoom session link</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Slides pdf</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_video_teacher.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Lesson video</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
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