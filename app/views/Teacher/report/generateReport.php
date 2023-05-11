<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher create report 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>

    <?php
    $category = "documents";
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/reportUploadSucess.php";
        }
    }
    ?>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Generate Reports</h1>
                    <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                            <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                            <br><br><br>
                            <h3>Enter student ID</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TReport/AskFeedback/<?php echo "$cid"; ?>" method="POST">
                        <label for="class_name"></label>
                        <input type="text" id="student_id" name="student_id" placeholder="Student ID..">
                        <br>
                        <h3>Report Category</h3>
                        <label for="report_category"></label>
                        <select id="report_category" name="report_category">
                            <option value="" disabled selected>Select Quiz amount</option>
                            <option value="1">Analyse last 5 quizzes</option>
                            <option value="2">Analyse last 10 quizzes</option>
                            <option value="3">Analyse last 15 quizzes</option>
                            <option value="4">Analyse last 20 quizzes</option>
                        </select>
                        <input type="submit" value="Add">
                        <!--<input type="submit" value="Next">-->
                    </form>
                </div>

            </section>

            <!-- bottom part -->
            <section class="Generate_reports-class-bottom">
                <div class="Generate_reports-decorator">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/report.png" alt="issue man">
                </div>
            </section>



        </div>
    </section>
</body>
<script>
</script>

</html>