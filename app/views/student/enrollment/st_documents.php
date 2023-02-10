<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_Inside_subject">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
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
                        <div class="rc-pp-row rc-pp-row-head">
                            <div class="rc-resource-col">PDF Name</div>
                            <div class="rc-resource-col">Lesson</div>
                            <div class="rc-resource-col">Part</div>
                            <div></div>
                        </div>

                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 1</div>
                            <div class="rc-resource-col">Lesson 1</div>
                            <div class="rc-resource-col">1</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_documents/st_document_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_documents/st_documents_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 2</div>
                            <div class="rc-resource-col">Lesson 2</div>
                            <div class="rc-resource-col">2</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_documents/st_document_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_documents/st_documents_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Document 3</div>
                            <div class="rc-resource-col">Lesson 3</div>
                            <div class="rc-resource-col">3</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_documents/st_document_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_documents/st_documents_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>