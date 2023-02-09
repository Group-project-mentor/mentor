<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Buy Me A Coffee</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL?>st_profile">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>BUY ME A COFFEE</h1>
                    <h6>Student Home/ Buy Me a Coffee</h6>
                    <br><br><br>
                    <h3>Enter the amount</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL;?>St_buy" method="POST">
                      <label for="class_name"></label>
                      <input type="text" id="class_name" name="class_name" placeholder="Enter the amount">
                     <br><br>
                      <a href="<?php echo BASEURL?>St_buy/St_buy_in"><div style="width:100px" class="back-btn">Next</div></a>
                    </form>
                  </div>

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL?>public/assets/clips/lap_man.png" alt="lap man">
                </div>
            </section>


            
        </div>  
    </section>      
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>