<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">

    <style>
        .token {
            border-style: solid;
            border-color: #17ac06;
            border-width: 3px;
            text-align: center;
            padding: 10px 35px 10px 35px;
            width: 300px;
            margin-left: 37.5%;
        }

        body {
            background-image: url('../public/assets/clips/HumaaansWireframe');
            background-position: center;
            background-size: cover;
        }
    </style>
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
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
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
            <section>
                <div>
                    <br>
                    <h2>Join with class token</h2>
                    <h4>Get the class token of your teacher and join to the class. <br><br><br></h4>
                    <h3 class="token">
                        <b>Entering the token here : </b>
                        <div class="search-bar">
                            <input type="text" name="" id="" placeholder=" Search...">
                            <a href="#">
                                <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                            </a>
                        </div>
                        <hr>
                    </h3>
                </div>
                <div class="subject-card-set">
                    <br><br>
                    <hr>
                    <br><br>
                    <!-- tempary movement 1-->
                    <div class="subject-card" style="text-align:center ; ">
                        <a href="<?php echo BASEURL  ?>st_private_mode/st_classroom_inside">
                            <img src="<?php echo BASEURL  ?>assets/patterns/1.png" alt="" style="width : 250px ; height:150px;" />
                            <br>
                            <div>
                                <label>Mathematics</label>
                                <br>
                                <label>Grade 8</label>
                                <br>
                                <label>Mr.Thimira Galahitiyawa</label>
                                <br><br>
                                <label style="width:100px ; " class="back-btn">Join</label>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>