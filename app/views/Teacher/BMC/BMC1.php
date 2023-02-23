<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMC</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php"?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                        <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>BUY ME A COFFEE</h1>
                    <h6>Teacher Home/ Buy Me a Coffee</h6>
                    <br><br><br>
                    <h3>Enter the amount</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL;?>privateclass/createAction" method="POST">
                      <label for="class_name"></label>
                      <input type="text" id="class_name" name="class_name" placeholder="Enter the amount">
                     
                      <a href="<?php echo BASEURL?>TBmc/BMC2" style="text-decoration:none"><div class="mid-back-btn">Next</div></a>
                    </form>
                  </div>

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/bmc1.png" alt="lap man">
                </div>
            </section>


            
        </div>  
    </section>      
</body>


</html>