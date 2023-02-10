<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Report issue</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_1.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                
                    <a href="<?php echo BASEURL?>home">
                        <div class="back-btn">Back</div>
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
                    <h1>Report Issues</h1>
                    <h6>Student Home/ Report Issues</h6>
                    <br><br><br>
                    <h3>Choose a category under your complaint</h3>
                </div>
                
                <div class="class section">
                    <form>
                  
                      <label for="issue"></label>
                      <select id="issue" name="issue">
                        <option value="Category1">Grade issue</option>
                        <option value="Category2">Subject issue</option>
                        <option value="Category3">Profile issue</option>
                        <option value="Category4">Payment issue</option>
                        <option value="Category5">Buy me a coffee issue</option>
                        <option value="Category6">Settings issue</option>
                      </select>
                    
                      <!--<input type="submit" value="Next">-->
                      <br><br>
                      <a href="<?php echo BASEURL?>st_report_main/st_report_text"><div class="back-btn" style="width:100px">Next</div></a>
                    </form>
                  </div>

            </section>

             <!-- bottom part -->
             <section class="Teacher-class-bottom">
                <div class="issue-decorator">
                    <img src="<?php echo BASEURL?>public/assets/clips/issue.png" alt="profile" style="height:50% ; width:50% ; margin-left: auto;
  margin-right: auto;">
                </div>
            </section>

            
        </div>  
    </section>      
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>