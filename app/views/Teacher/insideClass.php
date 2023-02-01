<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher-classroom inside</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                <img src="<?php echo BASEURL?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                <img src="<?php echo BASEURL?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>




            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php BASEURL ?>membersDetails" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                </a>
                <a href="<?php BASEURL ?>addResources" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_resources.png" alt="home">
                    <div class="nav-link-text">Resources</div>
                </a>
                <a href="<?php BASEURL ?>addTeacher" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_teacher.png" alt="home">
                    <div class="nav-link-text">Add Teacher</div>
                </a>
                <a href="<?php BASEURL ?>addStudent" class="nav-link" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_student.png" alt="home">
                    <div class="nav-link-text">Add Student</div>
                </a>
                <a href="<?php BASEURL ?>generateReport" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/generate_report.png" alt="home">
                    <div class="nav-link-text">Generate Reports</div>
                </a>
                <a href="<?php BASEURL ?>forum" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/forum.png" alt="home">
                    <div class="nav-link-text">Create Forum</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C136 - Science Grade 9</h1>
                    <h6>Teacher Home / C136</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h3>General</h3>
                        <a href="<?php BASEURL ?>AddResources">
                            <div class="rc-add-btn">
                                Add Resource
                            </div>
                        </a>
                    </div>

                    <div class="rc-resource-table">

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Announcement</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
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
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Forum</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_zoom.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Zoom session link</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/pdf_resources.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Slides pdf</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_video_teacher.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 1 - Lesson video</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
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
                            
                            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_announ.png" alt="delete">
                            <div class="rc-resource-col"><h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Forum</h1></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_zoom.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Zoom session link</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/pdf_resources.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Slides pdf</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
                                </button>
                            </div>
                        </div>

                        <div class="rc-pp-row">
                            
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_video_teacher.png" alt="delete">
                            <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day 2 - Lesson video</div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-resource-col"></div>
                            <div class="rc-quiz-row-btns">
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_delete.png" alt="delete">
                                </button>
                                <button>
                                <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_edit.png" alt="edit">
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