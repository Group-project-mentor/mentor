<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Report issue 1</title>
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
                        <a class="back-btn" href="<?php echo BASEURL ?>TReportIssue/reportissues">Back</a>
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
                    <h1>Report Issues</h1>
                    <h6>Teacher Home/ Report Issues</h6>
                    <br><br><br>
                    <h3>Choose a category under your complaint</h3>
                    <br>
                </div>
                
                <div class="class section">
                    <form>
                  
                      <textarea id="w3review" name="w3review" rows="4" cols="50"></textarea>
                    
                      <input type="submit" value="Next">
                    </form>
                  </div>

            </section>

             <!-- bottom part -->
             <section class="Teacher-class-bottom">
                <div class="issue-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/issue.png" alt="profile">
                </div>
            </section>

            
        </div>  
    </section>      
</body>


</html>