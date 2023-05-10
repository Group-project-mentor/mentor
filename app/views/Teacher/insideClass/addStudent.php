<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>

    <?php
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/student_add.php";
        } elseif ($_SESSION['message'] == "failed") {
            include_once "components/alerts/Teacher/student_add_failed.php";
        } elseif ($_SESSION['message'] == "already") {
            include_once "components/alerts/Teacher/already.php";
        } elseif ($_SESSION['message'] == "duplicate") {
            include_once "components/alerts/Teacher/duplicateST.php";
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
                    <h1>Add Student</h1>
                    <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                            <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                            <br><br><br>
                            <h3>Student Name</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TInsideClass/createAction" method="POST">
                        <label for="student_name"></label>
                        <input type="text" id="student_name" name="student_name" placeholder="New student Name..">
                        <h3>Student ID</h3>
                        <label for="student_id"></label>
                        <input type="text" id="student_id" name="student_id" placeholder="New student ID..">
                        <input type="submit" value="Request to join" id="Request to join">
                    </form>
                </div>

                <div class="mid-title">

                    <br>

                </div>



            </section>

            <!-- bottom part -->
            <section class="Student-class-bottom">
                <div class="Student-decorator">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/add_student.png" alt="issue man">
                </div>
            </section>



        </div>
    </section>
</body>
<script>
    function checkClassName() {
        document.getElementById("Request to join").addEventListener("click", function(event) {
            var name = document.getElementById("student_name").value;
            if (name.trim() === '') {
                alert("Please enter Student Name.");
                event.preventDefault(); // stop form submission
            }

            var sid = document.getElementById("student_id").value;
            if (sid.trim() === '') {
                alert("Please enter Student ID.");
                event.preventDefault(); // stop form submission
            }
        });
    }

    window.addEventListener("load", checkClassName);
</script>

</html>