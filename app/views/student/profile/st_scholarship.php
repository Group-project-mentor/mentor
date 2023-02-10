<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
         <!-- Navigation panel -->
         <?php include_once "components/navbars/st_navbar_4.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL?>st_profile">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                    <a href="<?php echo BASEURL?>logout">
                        <div class="back-btn">Log Out</div>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Request Scholarship</h1>
                    <h4>Hello, Mr. kamal</h4>
                    <br><br><br>
                </div>
                <div>
                    <h2 style="color:red">Please read all the instructions ... </h2>
                    <br>
                </div>
                <div>
                        <ol>
                            <li>There are many variations of passages of Lorem Ipsum available, 
                        but the any variations of passages of Lorem Ipsum available, 
                        but the There are many variations of passages of Lorem Ipsum available, 
                        but the </li>
                            <li>There are many variations of passages of Lorem Ipsum available, 
                        but the any variations of passages of Lorem Ipsum available, 
                        but the There are many variations of passages of Lorem Ipsum available, 
                        but the</li>
                            <li>There are many variations of passages of Lorem Ipsum available, 
                        but the any variations of passages of Lorem Ipsum available, 
                        but the There are many variations of passages of Lorem Ipsum available, 
                        but the </li>
                            <li>There are many variations of passages of Lorem Ipsum available, 
                        but the any variations of passages of Lorem Ipsum available, 
                        but the There are many variations of passages of Lorem Ipsum available, 
                        but the</li>
                            <li>There are many variations of passages of Lorem Ipsum available, 
                        but the any variations of passages of Lorem Ipsum available, 
                        but the There are many variations of passages of Lorem Ipsum available, 
                        but the</li>
                        </ol>
                </div>
                <br><br><br>
                <!-- &#x2022; can used to put point mark -->
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL?>st_profile/Scholarship_page2">
                        <div class="back-btn">Request Form</div>
                    </a>
                </div>
            </section>
        </div>
    </section>
    </div>
    </section>
</body>


</html>