<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Scholarship</title>
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
                    <a href="<?php echo BASEURL?>st_profile/Scholarship_page1">
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
                <form action="<?php echo BASEURL?>st_profile/scholarship_page2_action" method="POST">
                    <h2>Scholarship Application Form</h2><br><br>
                    
                    <p>First Name *</p>
                    <div class="form-group">
                        <input  type="text" name="fname">
                    </div>

                    <p>Last Name *</p>
                    <div class="form-group">
                        <input  type="text" name="lname">
                    </div>
                
                

                    <p>Address *</p>
                    <div class="form-group">
                        <input  type="text" name="addr">
                    </div>
                
                

                    <p>School</p>
                    <div class="form-group">
                        <input  type="text" name="sch" >
                    </div>
                
                

                    <p>E-mail *</p>
                    <div class="form-group">
                        <input  type="text" name="email">
                    </div>


                    <p>Country *</p>
                    <div class="form-group">
                        <input  type="text" name="coun" >
                    </div>
                
                    <p>Contact number *</p>
                    <div class="form-group">
                        <input  type="text" name="cno" >
                    </div>

                    <p>Information CV *</p>
                    <div class="form-group">
                        <input  type="text" >
                    </div>

                    <p>Your or parent ID *</p>
                    <div class="form-group">
                        <input  type="text">
                    </div>

                    <p>Description</p>
                    <div class="form-group">
                        <input  type="text" name="des" >
                    </div>
                    
                    <div>
                        <button type="submit" class="back-btn">Request</button>
                    </div>

                </form>
            </section>
        </div>
    </section>
    </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>