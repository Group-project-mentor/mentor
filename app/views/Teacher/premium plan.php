<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Premium Plan</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                <img src="<?php echo BASEURL?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                <img src="<?php echo BASEURL?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>
            
            <!-- Navigation bar private - public switch -->
            <div class="nav-middle" id="nav-middle">
                <p>Public</p>
                <div class="nav-switch">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
                <p class="nav-switch-txt">Private</p>
            </div>


            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_class.png" alt="home">
                    <div class="nav-link-text">Classes</div>
                </a>
                <a href="<?php BASEURL ?>premiumPlan" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_premium.png" alt="cource">
                    <div class="nav-link-text">Buy Premium</div>
                </a>
                <a href="<?php BASEURL ?>report" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_report.png" alt="profile">
                    <div class="nav-link-text">Report Issue</div>
                </a>
                <a href="<?php BASEURL ?>billing" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_billing.png" alt="report">
                    <div class="nav-link-text">Billing</div>
                </a>
                <a href="<?php echo BASEURL ?>bmc" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
                    </a>
                    <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>privateclass/profile">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
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
    <li class="grey"><a href="<?php echo BASEURL ?>privateclass/premiumCheckout" class="button">Sign Up</a></li>
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
    <li class="grey"><a href="<?php echo BASEURL ?>privateclass/premiumCheckout" class="button">Sign Up</a></li>
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
    <li class="grey"><a href="<?php echo BASEURL ?>privateclass/premiumCheckout" class="button">Sign Up</a></li>
  </ul>
</div>

</div>



<style>
    * {
      box-sizing: border-box;
    }
    
    .columns {
      float: left;
      width: 33.3%;
      padding: 8px;
    }
    
    .price {
      list-style-type: none;
      border: 1px solid #eee;
      margin: 0;
      padding: 0;
      -webkit-transition: 0.3s;
      transition: 0.3s;
    }
    
    .price:hover {
      box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
    }
    
    .price .header {
      background-color: #111;
      color: white;
      font-size: 25px;
    }
    
    .price li {
      border-bottom: 1px solid #eee;
      padding: 20px;
      text-align: center;
    }
    
    .price .grey {
      background-color: #eee;
      font-size: 20px;
    }
    
    .button {
      background-color: #186537;
      border: none;
      color: white;
      padding: 10px 25px;
      text-align: center;
      text-decoration: none;
      font-size: 18px;
    }
    
    
    </style>


            </section>

            
        </div>  
    </section>      
</body>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        }

        else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })



</script>

</html>