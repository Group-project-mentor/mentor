<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Billing 2</title>
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
                        <a class="back-btn" href="<?php echo BASEURL ?>TBilling/Billing1">Back</a>
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
                    <h1>Billing</h1>
                    <h6>Teacher Home/Billing</h6>
                    <br><br><br>
                    <h3>Transaction details</h3>
                    <br><br>
                    
                </div>

            

                <br><br>

                <div class="class section">
                    <form>
                      <label for="class_name"></label>
                      <input type="text" id="user_name" name="user name" placeholder="Reciver name..">
                    
                      
                    </form>
                  </div>

                  <div class="class section">
                    <form>
                      <label for="class_name"></label>
                      <input type="text" id="user_id" name="user id" placeholder="Reciver account no..">
                    
                      
                    </form>
                  </div>

                  <div class="class section">
                    <form>
                      <label for="class_name"></label>
                      <input type="text" id="user_id_relation" name="user id" placeholder="Enter your relationship to them..">
                    
                      <input type="submit" value="Continue">
                    </form>
                  </div>
                      
               

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/billing.png" alt="lap man">
                </div>
            </section>


            
        </div>  
    </section>      
</body>



</html>