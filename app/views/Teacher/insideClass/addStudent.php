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
    <section class="page">
    <?php if(!empty($_SESSION['message'])){
        switch ($_SESSION['message']){
            case "Your have successfully added the teacher":
                include_once "components/alerts/Teacher/teacher_addded.php";
                break;
            case "Your add student limit for free account is over":
                include_once "components/alerts/Teacher/addTeacherLimit.php";
                break;
        }
    } ?>
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
                    <h3><?php echo "Class ID-".$_SESSION['cid']?><h3>
                    <h3><?php echo " Class Name-".ucfirst($_SESSION['cname']) ?> </h3>
                    <br><br><br>
                    <h3>Student ID</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TInsideClass/createAction" method="POST">
                        <label for="student_id"></label>
                        <input type="text" id="student_id" name="student_id" placeholder="New student ID..">
                        <input type="submit" value="Request to join">
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
    
</script>

</html>