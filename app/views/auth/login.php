<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/login_style.css">

    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
        <?php include_once "components/alerts/rightAlert.php"?>
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo BASEURL ?>login/verify_login" class="sign-in-form" method="POST">
            <h2 class="title">Login</h2>
            <div class="input-field" style="<?php echo $data == 2 ? 'border:1px solid red;' : 'border:1px solid transparent;' ?>">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" id="email" name="email" />
            </div>
            <?php if ($data == 2) {?>
              <small style="color: red;text-align:right;">You are not registered !</small>
              <?php }?>
              <?php if ($data == 3) {?>
                <small style="color: red;text-align:right;">Wrong email entered !</small>
              <?php }?>
            <div class="input-field" style="<?php echo $data == 1 ? 'border:1px solid red;' : 'border:1px solid transparent;' ?>">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="passwd" name="passwd" />
            </div>
            <?php if ($data == 1) {?>
            <small style="color: red;text-align:right;">Password is wrong !</small>
            <?php }?>

            <!-- <input type="submit" value="Login" class="btn solid" /> -->
            <button class="btn solid" type="submit" name="login"  style="text-align:center ; text-decoration : none ;">Log in</button>
            <a class="text-decoration:none;" href="<?php echo BASEURL ?>forgotPassword">
              <h5 style="color: blue;text-decoration:none;">Forgot your password</h5>
            </a>
            <br>
          </form>

          <form action="<?php echo BASEURL ?>register/verify_register_student" class="sign-up-form" method="POST" id="sign-up-student">
            <h2 class="title">Register Student</h2>
            <div class="regset">
              <h6 class="sub-title active-panel">Student</h6>
              <h6 class="sub-title" id="teacherSwitch">Teacher</h6>
            </div>
            <hr class="horiz-line hr-100">
            <small id="sRegAlert" style="color: red;text-align:center;"></small>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your name"  id="stName" name="name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Enter your email"  id="stEmail" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your age" name="stAge" id="sage"/>

            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter your Password" id="spasswd" name="stPasswd" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re-enter your Password" id="spasswd_conf" name="stPassConf" />
            </div>
            <input type="submit" class="btn" value="Sign up" name="register" />
          </form>

          <form action="<?php echo BASEURL ?>register/verify_register_teacher" style="display: none;" class="sign-up-form" method="POST" id="sign-up-teacher">
            <h2 class="title">Register Teacher</h2>
            <div class="regset">
              <h6 class="sub-title" id="studentSwitch">Student</h6>
              <h6 class="sub-title active-panel">Teacher</h6>
            </div>
            <hr class="horiz-line hr-100">
            <small id="tRegAlert" style="color: red;text-align:center;"></small>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your name"  id="tname" name="tname"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Enter your email"  id="temail" name="temail"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter your Password" id="tpasswd" name="tpasswd" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re-enter your Password" id="tpasswd_conf" name="tcpasswd" />
            </div>
            <input type="submit" class="btn" value="Sign up" name="register" id="teacherReg" />
          </form>
        </div>
      </div>


      <div class="panels-container">
              <div class="panel left-panel">
                <div class="content">
                  <h3>New  here ?</h3>
                  <p>
                    Join with us to grow your service,
                    We are waiting for you!
                    <br>
                    You would think teaching has never been this much easy and fun :)
                  </p>
                  <button class="btn transparent" id="sign-up-btn">
                    Sign up
                  </button>
                </div>

                <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/login.png" alt="home" class="image">
              </div>
              <div class="panel right-panel">
                <div class="content">
                  <h3>One of us ?</h3>
                  <p>
                    Welcome back our team-mate. Let's head in to your account
                  </p>
                  <button class="btn transparent" id="sign-in-btn">
                    Sign in
                  </button>
                </div>

                <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/login.png" class="image" alt="" />
              </div>
            </div>
          </div>
        <script>
            const BASEURL = "<?php echo BASEURL ?>";
        </script>
    <script src="<?php echo BASEURL ?>javascripts/authMain.js"></script>
        </body>
      </html>
