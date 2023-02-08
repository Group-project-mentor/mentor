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
                        <a class="back-btn" href="<?php echo BASEURL ?>St_buy">Back</a>
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
                    <h3>you entered</h3><br>
                    <h3>rs ***** amount</h3><br>
                    <h3>to pay,</h3><br>
                    <hr>
                    <br>
                    <h3><b>payments details</b></h3><br>
                    <br>
                    <p>you can pay with credit or debit card</p><br><br>
                    
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL;?>privateclass/createAction" method="POST">
                        <label for="class_name"></label>
                        <h3>Enter the amount</h3><br>
                        <input type="text" id="class_name" name="class_name" placeholder="Enter the amount">
                        <br><h3>Enter expiry date</h3><br>
                        <input type="date" id="class_name" name="class_name" >
                        <br><h3>Enter security code</h3><br>
                        <input type="text" id="class_name" name="class_name" placeholder="Enter security code">

                        <a href="#">
                            <button type="submit" name="submit">Pay</button>
                        </a>
                    </form>
                  </div>

            </section>



            
        </div>  
    </section>      
</body>


<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>