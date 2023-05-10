<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Restrict Student</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
<section class="page">
       <!-- Navigation panel -->
       <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">
           <!-- Top bar -->
           <section class="top-bar">
                
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>TClassMembers/memDetails">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Restrict Student</h1>
                    <br><br>
                    <h3>Assign Privileges</h3>
                </div>
                
                <div class="class section">
                    <form>
                  
                      <label for="issue"></label>
                      <select id="issue" name="issue">
                        <option value="Category1">Privilege 1</option>
                        <option value="Category2">Privilege 2</option>
                        <option value="Category3">Privilege 3</option>
                        <option value="Category4">Privilege 4</option>
                        <option value="Category5">Privilege 5</option>
                        <option value="Category6">Privilege 6</option>
                      </select>
                    
                      <input type="submit" value="Submit">
                    </form>
                  </div>

            </section>

             <!-- bottom part -->
             <section class="Teacher-class-bottom">
                <div class="issue-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/restrict student.png" alt="issue man">
                </div>
            </section>

            
        </div>  
    </section>      
</body>
<script>
  
</script>

</html>