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
    <?php include_once "components/navbars/t_navbar_3.php"?>

    <?php
    $category = "documents";
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "done") {
            include_once "quiz_alerts/updateSuccess.php";
        }
        elseif ($_SESSION['message'] == "failed") {
            include_once "quiz_alerts/updateSuccess.php";
        }
        elseif ($_SESSION['message'] == "unauthorized") {
            include_once "quiz_alerts/no_permission.php";
        }
    }
    ?>

    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'TQuiz/questions/'.$data[0] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".ucfirst($_SESSION['cid']) ?></h1>
                <h2>Create Quiz</h2>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['cid']) ?> / Edit Quiz / <?php echo $data[1]->id ?> </h6>
            </div>

            <!-- Content area -->
            <div class="container-box quiz-box">
                <form action="<?php echo BASEURL.'TQuiz/editAction/'.$data[1]->id ?>" method="POST">
                    <div class="rc-form-group">
                        <label for="quiz_name" class="rc-form-label">
                            Quiz Name :
                        </label>
                        <input type="text"
                               name="quiz_name"
                               id="quizName"
                               class="rc-form-input"
                               placeholder="Ex : Test 1"
                               value="<?php echo $data[1]->name ?>"
                        />
                    </div>

                    <div class="rc-form-group">
                        <label for="tot_mark" class="rc-form-label">
                            Total Marks :
                        </label>
                        <input type="text"
                               name="tot_mark"
                               id="tot_mark"
                               class="rc-form-input"
                               placeholder="Ex : 100"
                               value="<?php echo $data[1]->marks ?>"
                        />
                    </div>
<!--                    <div class="rc-form-group">-->
<!--                        <label for="tot_mark" class="rc-form-label">-->
<!--                            Instructions :-->
<!--                        </label>-->
<!--                        <small>Add instructions one by one</small>-->
<!--                        <div style="display: flex;">-->
<!--                            <input type="text"-->
<!--                                   name="tot_mark"-->
<!--                                   id="tot_mark"-->
<!--                                   class="rc-form-input"-->
<!--                                   placeholder=""-->
<!--                                   style="flex: 1;"-->
<!--                            />-->
<!--                            <button type="button" class="rc-quiz-button green" style="width: 30px;margin: 10px">+</button>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->

                    <div class="rc-form-group">
                        <button type="submit" class="rc-quiz-button green">
                            Change
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

