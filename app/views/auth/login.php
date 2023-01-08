<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/login_style.css">
    
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form">
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" />
            </div>
            <!-- <input type="submit" value="Login" class="btn solid" /> -->
            <a href="<?php echo BASEURL?>home" class="btn solid" style="text-align:center ; text-decoration : none ;">Log in</a>
            <br>
            
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Register</h2>
            <h5 class="sub-title">Teacher</h5>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Enter your email" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Enter your age" />
            </div>
            <div class="input-field">  
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Enter your Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Re-enter your Password" />
            </div>
            <input type="submit" class="btn" value="Sign up" /> 
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <br>
        
            
              Welcome back our team-mate. Let's head in to your account
            </p>
            
          </div>
          
          <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/clips/login.png" alt="home">
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
          <img src="img/reg.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
