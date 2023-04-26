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
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>




            <?php
            $cid = $_SESSION["cid"];
            ?>



            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>TClassMembers/memDetails/<?php echo "$cid"; ?>"" class=" nav-link">
                    <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                    <a href="<?php echo BASEURL ?>TResources/resource" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_resources.png" alt="home">
                        <div class="nav-link-text">Resources</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TInsideClass/addTr/<?php echo "$cid"; ?>" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/add_teacher.png" alt="home">
                        <div class="nav-link-text">Add Teacher</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TInsideClass/addSt" class="nav-link" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/add_student.png" alt="home">
                        <div class="nav-link-text">Add Student</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TReport/generateReport" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/generate_report.png" alt="home">
                        <div class="nav-link-text">Generate Reports</div>
                    </a>
                    <a href="<?php echo BASEURL ?>joinRequests/getRequests/<?php echo "$cid"; ?>" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/forum.png" alt="home">
                        <div class="nav-link-text">Join Requests</div>
                    </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>

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
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })
</script>

</html>