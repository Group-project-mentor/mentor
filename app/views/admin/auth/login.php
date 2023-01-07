<!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="<?php echo BASEURL ?>stylesheets/admin/ad_login.css">
    </head>
    <body>
        <form action="login.php" method="POST">
            <?php if(isset($_GET['error'])) { ?>
                <p class="error"> <?php echo $_GET['error']; ?> </p>

            <?php } ?>
            <div class="navbar">
                <img  class="logo" src="<?php echo BASEURL ?>assets/admin/logo-w.png">
            </div>
            <div class="container">
            <div class="imgarea">
                <img  class="img" src="<?php echo BASEURL ?>assets/admin/login.png "> 
            </div>
        
            <div class="dataarea">
                <div class="loginarea">
                    <div class="h1">
                        <h2>Login</h2>
                    </div>
                    <div class="logininfo">
        
                        <label for="Email" id="email">email</label><br>
                        <input type="email" name="uname" placeholder="   Enter email address"><br>
        
                        <label for="password" id="password">password</label><br>
                        <input type="password" name="password" placeholder="    Enter password"><br>
                        
                    
                        <span class="psw"id="paw"><a href="#"><p>Forgot password?</p></a></span>
                        <p>



                            <button type="submit"><b>Login</b></button> 
                        </p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        </form>
    </body>
</html>