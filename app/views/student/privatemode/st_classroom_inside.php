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
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


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
                    <a href="<?php echo BASEURL; ?>st_private_mode">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C136 - Mathematics Grade 8</h1>
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

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>