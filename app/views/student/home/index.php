<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("location:" . BASEURL . "login");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/style.css' .'/public/stylesheets/st_student.css'?> ">    <!-- BASEURL use to navigate pages -->

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="/implimentation/studnt thimira/profile/student_profile.php">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Student</h1>
                    <h6>Hello </h6>
                </div>

                
                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="grade-switcher">
                        <img src="assets/icons/icon_prev.png" alt="left">
                        <div class="grades">
                            <div class="grade-card">
                                <img src="assets/grades/grade9.png" alt="">
                                <label for="title">Grade 9</label>
                            </div>
                            <a class="grade-card front" href="../profile/RC-cources.html" style="text-decoration: none; color:black;">
                                    <img src="assets/grades/grade8.png" alt="">
                                    <label for="title">Grade 8</label>
                            </a>
                            <div class="grade-card">
                                <img src="assets/grades/grade7.png" alt="">
                                <label for="title">Grade 7</label>
                            </div>
                        </div>
                        <img src="assets/icons/icon_next.png" alt="right">
                    </div>
                </div>
               
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
        }

        else {
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