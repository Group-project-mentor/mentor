<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<section class="page">
    
    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'rcResources/organized/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                <h2>Create Topic</h2>
            </div>

            <!-- Content area -->
            <div class="container-box quiz-box">
                <form action="<?php echo BASEURL ?>rcAdd/createTopic" method="POST">
                    <div class="rc-form-group">
                        <label for="quiz_name" class="rc-form-label">
                            Topic Name* :
                        </label>
                        <input type="text"
                               name="name"
                               id="quizName"
                               class="rc-form-input"
                               maxlength="50"
                               placeholder="Ex : Lesson 1"/>
                    </div>
                    <br>    
                    <div class="rc-form-group">
                        <label for="tot_mark" class="rc-form-label">
                            Topic Description :
                        </label>
                        <textarea 
                            name="description" 
                            placeholder="Ex: This is Lesson 1 description (optional)" 
                            rows="5" 
                            maxlength="1000"
                            style="margin:0;"></textarea>
                    </div>
                    <br>
                    <div class="rc-form-group">
                        <button type="submit" class="rc-quiz-button green">
                            Create
                        </button>
                    </div>
                </form>
            </div>
    </div>
</section>
</body>

<script>

</script>

</html>

