<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Home</title>

    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css"> <!-- BASEURL use to navigate pages -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_student.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_homepage.css">


    <style>
        body {
            background-image: url('public/assets/grades/logo1_dark.png');
            background-size:contain;
            background-repeat: no-repeat;
            background-position: center center;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL  ?>st_profile">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <!-- Middle part for whole content -->
            <section class="mid-content">

                <h2><?php echo "Hello " . $_SESSION['name'] . "!" ?></h2>

                <h3> Welcome To Mentor Learning Management System.</h3>
                <!-- Grade choosing interface -->
                <div style="margin:50px auto ;">
                    <table>
                        <tr>
                            <td>
                                <button>
                                    <a href="<?php echo BASEURL  ?>st_courses/index/1">
                                        <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                        Grade 06
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button>
                                    <a href=" <?php echo BASEURL  ?>st_courses/index/2">
                                        <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                        Grade 07
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button>
                                    <a href="<?php echo BASEURL  ?>st_courses/index/3">
                                        <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                        Grade 08
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button>
                                    <a href=" <?php echo BASEURL  ?>st_courses/index/4">
                                        <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                        Grade 09
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <td>
                            <button>
                                <a href=" <?php echo BASEURL  ?>st_courses/index/5">
                                    <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                    Grade 10
                                </a>
                            </button>
                        </td>
                        <td>
                            <button>
                                <a href=" <?php echo BASEURL  ?>st_courses/index/6">
                                    <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                    Grade 11
                                </a>
                            </button>
                        </td>
                        <td>
                            <button>
                                <a href="<?php echo BASEURL  ?>st_courses/index/7">
                                    <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                    Grade o/L
                                </a>
                            </button>
                        </td>
                        <td>
                            <button>
                                <a href=" <?php echo BASEURL  ?>st_courses/index/8">
                                    <img src="<?php echo BASEURL  ?>assets/icons/icon_settings.png" alt="">
                                    Grade A/L
                                </a>
                            </button>
                        </td>
                        </tr>
                    </table>
                </div>
                <br><br><br>
                <hr style="color: green; height:7px; background-color:green;">
            </section>

        </div>
    </section>
    </div>
    </section>
</body>

<script src="<?php echo BASEURL ?>javascripts/st_navbar_1.js"></script>

</html>