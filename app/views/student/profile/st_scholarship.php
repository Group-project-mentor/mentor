<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_profile">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL  ?>st_profile">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                    <a href="<?php echo BASEURL ?>logout">
                        <div class="back-btn">Log Out</div>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Request Scholarship</h2>
                    <h4>Hello, Mr. kamal</h4>
                    <br><br><br>

                    <div class="quiz-preview-container">
                        <h2 id="question-number">INSTRUCTIONS</h2>
                        <hr />
                        <div class="quiz-preview-question">
                            <h3 id="question-number">Please Read the Instructions First</h3>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a <i>list view</i> is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the most common uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <p id="question-name">
                                <b> (+)</b> One of the <b> most common </b> uses for a list view is displaying data that you fetch from a server.
                                To do that, you will need to learn about networking in React Native.
                            </p>
                            <div class="top-bar-btns">
                                <a href="<?php echo BASEURL ?>st_profile/Scholarship_page2">
                                    <div class="back-btn">Request Form</div>
                                </a>
                            </div>
                        </div>
                    </div>

            </section>
        </div>
    </section>
    </div>
    </section>
</body>


</html>