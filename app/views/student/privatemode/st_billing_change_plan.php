<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Premium Plan</title>
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
  <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/st_billing.css">
</head>

<body>
  <section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->


    <div class="content-area">

      <!-- Top bar -->
      <section class="top-bar">

        <div class="top-bar-btns">
          <a href="#">
            <a class="back-btn" href="<?php echo BASEURL ?>st_billing/st_billing_withdrow">Back</a>
          </a>
          <?php include_once "components/notificationIcon.php" ?>
          <a href="<?php echo  BASEURL ?>privateclass/profile">
            <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
          </a>
        </div>
      </section>

      <!-- Middle part for whole content -->
      <section class="mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
          <h1>Premium Plans</h1>
          <br><br>

          <div class="columns">
            <ul class="price">
              <li class="header">Basic</li>
              <li class="grey">$ 9.99 / year</li>
              <li>10GB Storage</li>
              <li>10 Emails</li>
              <li>10 Domains</li>
              <li>1GB Bandwidth</li>
              <li class="grey"><a href="<?php echo BASEURL ?>st_billing/st_billing_withdrow" class="button">Sign Up</a></li>
            </ul>
          </div>

          <div class="columns">
            <ul class="price">
              <li class="header" style="background-color:#186537">Pro</li>
              <li class="grey">$ 24.99 / year</li>
              <li>25GB Storage</li>
              <li>25 Emails</li>
              <li>25 Domains</li>
              <li>2GB Bandwidth</li>
              <li class="grey"><a href="<?php echo BASEURL ?>st_billing/st_billing_withdrow" class="button">Sign Up</a></li>
            </ul>
          </div>

          <div class="columns">
            <ul class="price">
              <li class="header">Premium</li>
              <li class="grey">$ 49.99 / year</li>
              <li>50GB Storage</li>
              <li>50 Emails</li>
              <li>50 Domains</li>
              <li>5GB Bandwidth</li>
              <li class="grey"><a href="<?php echo BASEURL ?>st_billing/st_billing_withdrow" class="button">Sign Up</a></li>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>