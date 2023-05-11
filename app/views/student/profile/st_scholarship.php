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
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>
            
            <!-- Middle part for whole content -->
            <section class="mid-content">
            <hr style="color: green; height:7px; background-color:green;">
            <br>
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Request Scholarship</h2>
                    <h3><?php echo "Hello " . $_SESSION['name'] . "!" ?></h3>
                    <br><br>

                    <div class="quiz-preview-container">
                        <h2 id="question-number">INSTRUCTIONS</h2>
                        <hr />
                        <div class="quiz-preview-question">
                            <h3 id="question-number">Please Read the Instructions First</h3>
                            <p id="question-name">
                                <b> (+) Personal Information:</b> Fill out your full name, address, email address etc.. and Guardian details.
                            </p>
                            <p id="question-name">
                                <b> (+)CV: </b>  Attach your CV with details of your academic qualifications, work experience (if any), and any other achievements.
                            </p>
                            <p id="question-name">
                                <b> (+) Scholarship Request: </b> Under <b>Brief Description of you*</b>Part, why you are applying for the scholarship and how 
                                it will help you achieve your academic or career goals. Be clear and concise in your explanation.
                            </p>
                            <p id="question-name">
                                <b> (+)Agreement: </b>Agree to the terms and conditions of the scholarship, including that it is 
                                valid for one year and that you must reapply after that time. Also, note that the scholarship amount
                                 is fixed by the site admin and cannot be changed.
                            </p>
                            <p id="question-name">
                                <b> (+)Confirmation of Eligibility:</b> Confirm that you are eligible for the 
                                scholarship by checking the requirements on the MENTOR LMS site.
                            </p>
                            <p id="question-name">
                                <b> (+)Submit:</b> Once you have completed the form, click the  <b>Apply Form Button</b> The MENTOR LMS site will review your application,
                                 and you will be notified of the results via your Contact number.
                            </p>
                            <p id="question-name">
                                <b> (+)Go to Form:</b> Once you have read the above all instructions and notices, you can go to the scholarship form
                                by clicking <b>Request Form Button</b>. 
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