<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher class</title>
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
                    <a href="<?php echo BASEURL?>home">
                        <div class="back-btn">Back</div>
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
                    <h1>Create Class</h1>
                    <h6>Teacher Home/ Create Class</h6>
                    <br><br><br>
                    <h3>Enter class name</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL;?>privateclass/createAction" method="POST">
                      <label for="class_name"></label>
                      <input type="text" id="class_name" name="class_name" placeholder="New class name..">
                      <input type="submit" value="create">
                    </form>
                  </div>
                  

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/lap_man.png" alt="lap man">
                </div>
            </section>


            
        </div>  
    </section>      
</body>


</html>