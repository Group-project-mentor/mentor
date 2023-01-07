<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Report issue 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/t_card_set.css">
</head>

<body>
    <section class="page">
         <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                
                <div class="top-bar-btns">
                    <a href="#">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>public/assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>public/assets/icons/icon_profile_black.png" alt="profile">
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
                </div>
                
                <div class="class section">
                    <form>
                  
                      <label for="issue"></label>
                      <select id="issue" name="issue">
                        <option value="Category1">Category 1</option>
                        <option value="Category2">Category 2</option>
                        <option value="Category3">Category 3</option>
                        <option value="Category4">Category 4</option>
                        <option value="Category5">Category 5</option>
                        <option value="Category6">Category 6</option>
                      </select>
                    
                      <input type="submit" value="Next">
                    </form>
                  </div>

            </section>

             <!-- bottom part -->
             <section class="Teacher-class-bottom">
                <div class="issue-decorator">
                    <img style="margin: auto;justify-self:center;" src="<?php echo BASEURL; ?>public/assets/clips/issue.png" alt="issue man">
                </div>
            </section>

            
        </div>  
    </section>      
</body>
</html>