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
    
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php" ?>

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
                    <a href="#">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Resource Creator</h1>
                    <h6>welcome <?php echo $_SESSION['name'] ?></h6>
                </div>

                <!-- Grade choosing interface -->
                <!-- <div class="container-box">
                    <div class="grade-switcher">
                        <img src="assets/icons/icon_prev.png" alt="left">
                        <div class="grades">
                            <div class="grade-card">
                                <img src="assets/grades/grade9.png" alt="">
                                <label for="title">Grade 9</label>
                            </div>
                            <div class="grade-card front">
                                <img src="assets/grades/grade8.png" alt="">
                                <label for="title">Grade 8</label>
                            </div>
                            <div class="grade-card">
                                <img src="assets/grades/grade7.png" alt="">
                                <label for="title">Grade 7</label>
                            </div>
                        </div>
                        <img src="assets/icons/icon_next.png" alt="right">
                    </div>
                </div> -->

                <!-- bottom part -->
                <section class="bottom-section-grades">
                    <div class="grade-table">
                        <h1>Grades</h1>
                        <hr>
                        <div class="grade-values">
                            <li>
                                <span>Grade 9</span>
                                <div>
                                    <div class="nav-switch">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <span>Grade 10</span>
                                <div>
                                    <div class="nav-switch">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </div>
                        <div>
                            <button type="submit">Save</button>
                        </div>
                    </div>
                    <div class="decorator">
                        <img src="assets/clips/lap_man.png" alt="lap man">
                    </div>
                </section>

        </div>
    </section>
    </div>
    </section>
</body>

</html>
