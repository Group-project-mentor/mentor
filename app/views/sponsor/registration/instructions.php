<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Questions</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>

<section class="page">

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <h1 style="font-size: x-large;">Register Creator</h1>

            <div class="top-bar-btns">
                <a href="<?php echo BASEURL ?>landing">
                    <div class="back-btn">Back</div>
                </a>
            </div>
        </section>

        <section class="quiz-preview-content">

            <div class="quiz-preview-container-box">
                <div class="rc-resource-header">
                </div>

                <div  class="quiz-preview-container" >
                    <h2 id="question-number">Read This Before Filling the Form</h2>
                    <hr />
                    <div class="quiz-preview-question" style="align-items: flex-start;" >
                        <h3 id="question-number" style="align-self: center;">Please Read the Instructions First</h3>
                        <p id="question-name">
                            <b> (+)</b> Provide your basic information such as your first name, last name, email address etc.
                            <b>Make sure that the email that you are entering is your signing email for the website. </b>
                        </p>
                        <p id="question-name">
                            <b> (+)</b> All the data you are entering should be correct and trustful...
                        </p>
                        <p id="question-name">
                            <b> (+)</b> After submitting your registration, you will receive an email to give notify you that
                            your data is received to us.
                        </p>
                        <p id="question-name">
                            <b> (+)</b> We will email you with some instructions if we selected you as a resource creator
                            of our website.
                        </p>
                        <p id="question-name">
                            <b> (+)</b> After that you can log in into our website as a resource creator with the email that you
                            provided to us.
                        </p>
                        <div class="quiz-preview-bottom-set" style="justify-content: flex-end;align-self: center;">
                            <a class="quiz-preview-bottom-button"
                               id="next-btn"
                               href="<?php echo BASEURL.'landing/registerCreator' ?>">
                                Go to Registration Form
                                <img src="<?php echo BASEURL ?>assets/icons/icon_next_white.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
</body>
</html>