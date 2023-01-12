<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL?>public/assets/clips/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL?>public/assets/clips/logo1.png" alt="logo" />
                </div>
            </div>

                 <!-- Navigation buttons -->
                 <div class="nav-links">
                <a href="<?php BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/icons/icon_class.png" alt="home">
                    <div class="nav-link-text">Classes</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_premium.png" alt="cource">
                    <div class="nav-link-text">Buy Premium</div>
                </a>
                <a href="<?php BASEURL ?>privateclass/report" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_report.png" alt="profile">
                    <div class="nav-link-text">Report Issue</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_billing.png" alt="report">
                    <div class="nav-link-text">Billing</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/Scholarship.png" alt="bmc">
                    <div class="nav-link-text">Get scholarship</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>public/assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

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