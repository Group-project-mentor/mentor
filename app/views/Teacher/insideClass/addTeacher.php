<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
    <?php include_once "components/alerts/Teacher/teacher_added.php" ?>
    <?php if(!empty($_SESSION['message'])){
        switch ($_SESSION['message']){
            case "Your have successfully added the teacher":
                include_once "components/alerts/Teacher/teacher_addded.php";
                break;
            case "Your add teacher limit for free account is over":
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
                        <a class="back-btn" href="<?php echo BASEURL ?>TInsideClass/InClass">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Add Teacher</h1>
                    <h6>Teacher Home/ C136-member details/Add teacher</h6>
                    <br><br>
                    <br>
                    <h3>Teacher name</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TInsideClass/addTchAction/<?php echo "$cid"; ?>" method="POST">
                        <label for="teacher_name"></label>
                        <input type="text" id="teacher_name" name="teacher_name" placeholder="New teacher name..">
                        <h3>Teacher Id</h3>
                        <label for="teacher_id"></label>
                        <input type="text" id="teacher_id" name="teacher_id" placeholder="New teacher id..">
                        <br>
                        <h3>Teacher Privilege</h3>
                        <label for="teacher_privilege"></label>
                        <select id="teacher_privilege" name="teacher_privilege">
                            <option value="1">Only add students</option>
                            <option value="2">Only add, restrict and delete students</option>
                            <option value="3">Only add resources</option>
                            <option value="4">Only add,edit and delete resources</option>
                        </select>
                        <input type="submit" value="Add">

                    </form>
                </div>


            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/add teacher.png" alt="issue man">
                </div>
            </section>



        </div>
    </section>
</body>
<script>
  
</script>

</html>