<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_verification.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>assets/admin/minilogo 1.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>assets/admin/logo-w.png" alt="logo" />
                </div>
            </div>


           <!-- Navigation buttons -->
           <div class="nav-links">
                <a href="<?php echo BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL ?>assets/admin/bi_grid-fill.png" alt="dsh">
                    <div class="nav-link-text">Dashboard</div>
                </a>
                <a href="<?php echo BASEURL ?>adhumanResource" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_people-fill.png" alt="hr">
                    <div class="nav-link-text">Human Resource</div>
                </a>
                <a href="<?php echo BASEURL ?>adVerification" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_patch-check-fill.png" alt="vc">
                    <div class="nav-link-text">Verification Center</div>
                </a>
                <a href="<?php echo BASEURL ?>adScholPro" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_mortarboard-fill.png" alt="sp">
                    <div class="nav-link-text">Scholorship Programe</div>
                </a>
                <a href="<?php echo BASEURL ?>adWallet" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/Vector.png" alt="wallet">
                    <div class="nav-link-text">Wallet</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/Vector (1).png" alt="an">
                    <div class="nav-link-text">Analitics</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>assets/admin/toogle.png" alt="toggler">
            </div>
        </nav>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/admin/Vector (2).png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/admin/Vector (3).png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/admin/Ellipse 2.png" alt="profile">
                    </a>
                </div>
            </section>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->


                <div class="content" id="comp-content">
                    <div class="bckclose">
                        <img class="back" src="<?php echo BASEURL ?>assets/admin/Arrow---Left.png">
                        <img class="close" src="<?php echo BASEURL ?>assets/admin/Close-Square.png">
                    </div>
                    <form class="form" action="<?php echo BASEURL ?>adAddnewadmin/add" method="POST">
                        <div class="mid-title">
                            <h1>Wallet </h1>
                        </div><br><br>

                                         <!-- Title and sub title of middle part -->
                

            

                <br><br>
                <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

<!-- Title and sub title of middle part -->


<div class="content" id="comp-content">
    <div class="bckclose">
        <img class="back" src="<?php echo BASEURL ?>assets/admin/Arrow---Left.png">
        <img class="close" src="<?php echo BASEURL ?>assets/admin/Close-Square.png">
    </div>
    <form class="form" action="<?php echo BASEURL ?>adAddnewadmin/add" method="POST">
        <div class="mid-title">
            <h1>Add New Admin </h1>
        </div>

        <div class="dataentry">
            <div class="l">
                <label for="Name" id="newadminname">New co-Admin name</label><br>
                <input type="Name" name="admin-name" placeholder="   Enter co-Admin's Name" class="inputfield"><br>
            </div>
            

            <div class="l">
                <label for="co-useremail" id="co-useremail">New co-Admin email</label><br>
                <input type="email" name="admin-mail" placeholder="   Enter co-Admin's email address" class="inputfield"><br>
            </div>

            


        </div>
        <div class="btns">
                <button class="comp-btns">Add and Send link via mail</button>

         </div>

        

    </form>

</div>

</section>

                
                  <a class="btns" href="#" style=" background-color: #4CAF50; /* Green */ border: none; color: white; text-align: center; padding: 12px 28px; border-radius: 12px; text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; text-decoration:none"><div class="mid-back-btn">See transaction history</div></a>
                      

                         <div class="btn" style="display: flex; justify-content:space-around; align-items: center;">
                <a class="btns" href="#" style=" background-color: #4CAF50; /* Green */ border: none; color: white; text-align: center; padding: 12px 28px; border-radius: 12px; text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; text-decoration:none"><div class="mid-back-btn">See transaction history</div></a>
                <a href="<?php echo BASEURL?>privateclass/premiumCheckout" style=" background-color: #4CAF50; /* Green */ border: none; color: white; text-align: center; padding: 12px 28px; border-radius: 12px; text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer; text-decoration:none"><div class="mid-back-btn">Withdraw money</div></a>
                  </div>

                        

                    </form>

                </div>

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
    // let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            // navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            // navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })
</script>
