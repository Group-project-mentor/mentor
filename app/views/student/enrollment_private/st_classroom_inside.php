<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-classroom inside</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_homepage.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_myclasses">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C136 - Mathematics Grade 8</h1>
                    <h6>Student Home / C136</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>Private Resources</h1>
                    </div>

                    <!-- Grade choosing interface -->
                    <div class="container-box" style="padding-left: 160px; width:auto; height: 100px;">
                        <table>
                            <tr>
                                <td><button><a href="<?php echo BASEURL  ?>st_courses/index/1">Videos</a></button></td>
                                <td><button><a href="<?php echo BASEURL  ?>st_courses/index/2">Documents</a></button></td>
                                <td><button><a href="<?php echo BASEURL  ?>st_courses/index/3">Past Papers</a></button></td>
                                <td><button><a href="<?php echo BASEURL  ?>st_courses/index/4">Quizzes</a></button></td>
                                <td><button><a href="<?php echo BASEURL  ?>st_courses/index/5">Other Resources</a></button></td>
                            </tr>
                        </table>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                    <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; width:100%;"></a>
            </section>
        </div>
    </section>
</body>

</html>