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
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/style.css">    <!-- BASEURL use to navigate pages -->
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/st_student.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <!-- Navigation panel -->
        
<nav class="nav-bar" id="nav-bar">

<!-- Navigation bar logos -->
<div class="nav-upper">
    <div class="nav-logo-short">
        <img src="<?php echo BASEURL ?>assets/clips/logo2.png" alt="logo" />
    </div>
    <div class="nav-logo-long" id="nav-logo-long">
        <img src="<?php echo BASEURL ?>assets/clips/logo1.png" alt="logo" />
    </div>
</div>



<!-- Navigation bar private - public switch -->
<div class="nav-middle" id="nav-middle">
    <p>Public</p>
    <div class="nav-switch">
        <label class="switch">
            <input type="checkbox" checked>
            <span class="slider round"></span>
        </label>
    </div>
    <p class="nav-switch-txt">Private</p>
</div>


<!-- Navigation buttons -->
<div class="nav-links">

    <a href="<?php echo BASEURL ?>st_report_from_grade.php" class="nav-link">
        <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
        <div class="nav-link-text"> Report</div>
    </a>
    <a href="<?php echo BASEURL ?>st_buy" class="nav-link">
        <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
        <div class="nav-link-text">Buy me a coffee</div>
    </a>
</div>


<!-- Navigation bar toggler -->
<div class="nav-toggler" id="nav-toggler">
    <img src="<?php echo BASEURL ?>assets/icons/toggler.png" alt="toggler">
</div>
</nav>  

<script src="<?php echo BASEURL . '/public/javascripts/st_navbar_1.js' ?>"></script>


        <!-- <a href="<?php echo BASEURL?>st_classroom_inside">hi</a> -->
                <!-- Right side container -->
                <!-- style="background-image: url('<?php echo BASEURL  ?>assets/clips/gradesback.jpg' ); 
        background-repeat: no-repeat; background-attachment: fixed;  background-size: cover; flex:right; -->
        <div class="content-area" >

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL  ?>st_profile2">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content" >
            <a class="see-all-btn" href="<?php echo BASEURL  ?>" style="text-decoration: none; "></a>

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Student</h1>
                    <h6>Hello </h6>
                </div>
                
                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="grade-switcher">
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_prev.png" alt="left">
                        <div class="grades">
                            <div class="grade-card">
                                <img src="<?php echo BASEURL  ?>assets/grades/grade9.png" alt="">
                                <label for="title">Grade 9</label>
                            </div>
                            <a class="grade-card front" href="<?php echo BASEURL?>st_courses" style="text-decoration: none; color:black;">
                                    <img src="<?php echo BASEURL  ?>assets/grades/grade8.png" alt="">
                                    <label for="title">Grade 8</label>
                            </a>
                            <div class="grade-card">
                                <img src="<?php echo BASEURL  ?>assets/grades/grade7.png" alt="">
                                <label for="title">Grade 7</label>
                            </div>
                        </div>
                        <img src="<?php echo BASEURL  ?>assets/icons/icon_next.png" alt="right">
                    </div>
                </div>
                <div>
                    <br><br><br><br><br><br><br><br>
                <a class="see-all-btn" href="<?php echo BASEURL  ?>st_classroom_inside" style="text-decoration: none; width:10%">Private</a>
                </div>
       
        </div>
    </section>
    </div>
    </section>
</body>

    <script src="<?php echo BASEURL ?>javascripts/st_navbar_1.js"></script>

</html>