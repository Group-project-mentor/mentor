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
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo BASEURL ?>login/verify_login" class="sign-in-form" method="POST">
            <h2 class="title">Login</h2>
            <div class="input-field" style="<?php echo $data == 2 ?'border:1px solid red;':'border:1px solid transparent;'?>">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" id="email" name="email" />
            </div>
            <?php if ($data == 2) {?>
              <small style="color: red;text-align:right;">You are not registered !</small>
              <?php }?>
              <?php if ($data == 3) {?>
                <small style="color: red;text-align:right;">Wrong email entered !</small>
              <?php }?>
            <div class="input-field" style="<?php echo $data == 1 ?'border:1px solid red;':'border:1px solid transparent;'?>">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" id="passwd" name="passwd" />
            </div>
            <?php if($data == 1){?>
            <small style="color: red;text-align:right;">Password is wrong !</small>
            <?php }?>
                 
            <!-- <input type="submit" value="Login" class="btn solid" /> -->
            <button class="btn solid" type="submit" name="login"  style="text-align:center ; text-decoration : none ;">Log in</button>
            <a class="text-decoration:none;" href="<?php echo BASEURL ?>forgotPassword">
              <h5 style="color: blue;text-decoration:none;">Forgot your password</h5>
            </a>
            <br>

          </form>
          <form action="<?php echo BASEURL ?>register/verify_register" class="sign-up-form" method="POST">
            <h2 class="title">Register</h2>
            <h5 class="sub-title">Teacher</h5>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your name"  id="name" name="name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Enter your email"  id="email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your age" />

            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter your Password" id="passwd" name="passwd" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re-enter your Password" id="passwd_conf" name="cpasswd" />
            </div>
            <input type="submit" class="btn" value="Sign up" name="register" />
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

          <script> const sign_in_btn = document.querySelector("#sign-in-btn");
                   const sign_up_btn = document.querySelector("#sign-up-btn");
                   const image = document.querySelector('#loginPic');
                   const container = document.querySelector(".container");
                   const regPic = document.getElementById('regPic');

                   sign_up_btn.addEventListener("click", () => {
                     container.classList.add("sign-up-mode");
                     image.classList.add("sign-up-mode");
                     regPic.classList.remove("sign-up-mode");

                    });

                    sign_in_btn.addEventListener("click", () => {
                      container.classList.remove("sign-up-mode");
                      image.classList.remove("sign-up-mode");
                      regPic . classList . add("sign-up-mode");
                   });
</script>
        </body>
      </html>
