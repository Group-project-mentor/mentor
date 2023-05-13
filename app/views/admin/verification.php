<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <!-- <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css"> -->
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">

    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_verification.css">
    
</head>


<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Verification Center</h1>
                </div>

                <div class="content" id="comp-content" >
                    <div class="bckclose">
                        <img class="back" src="<?php echo BASEURL ?>assets/admin/Arrow---Left.png">
                        
                        
                    </div>
                    <div class="resource">
                        <a href="<?php echo BASEURL ?>admins/verify/videos" class="resource-link">
                            <div class="r">
                                <img src="<?php echo BASEURL ?>assets/admin/RV/video.gif">
                            </div>
                            <div class="name">
                                <p>Videos</p>
                            </div>
                        </a>
                        <a href="<?php echo BASEURL ?>admins/verify/quizzes" class="resource-link">
                            <div class="r">
                                <img src="<?php echo BASEURL ?>assets/admin/RV/quiz.gif">
                                
                            </div>
                            <div class="name">
                                <p>Quizes</p>
                            </div>
                        </a>
                        <a href="<?php echo BASEURL ?>admins/verify/pastpappers" class="resource-link">
                            <div class="r">
                                <img src="<?php echo BASEURL ?>assets/admin/RV/pastpaper.gif">
                                
                            </div>
                            <div class="name">
                                <p>Past Papers</p>
                            </div>
                        </a>
                        <a href="<?php echo BASEURL ?>admins/verify/pdf" class="resource-link">
                            <div class="r">
                                <img src="<?php echo BASEURL ?>assets/admin/RV/pdf.gif">
                                
                            </div>
                            <div class="name">
                                <p>PDFs</p>
                            </div>
                        </a>
                        <a href="<?php echo BASEURL ?>admins/verify/others" class="resource-link">
                            <div class="r">
                                <img src="<?php echo BASEURL ?>assets/admin/RV/other.gif">
                                
                            </div>
                            <div class="name">
                                <p>Other</p>
                            </div>
                        </a>
                    </div>
                </div>
                
            </section>
        </div>
    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>
        
</body>
<!-- <script src="C:\xampp\htdocs\mentor\public\javascripts\admin\popup.js"></script> -->
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

    const profileBtn = document.getElementById("profile-btn");
    const popupMenu = document.getElementById("popup-menu")
    let toggler = false;

    profileBtn.addEventListener('click', () => {
        if (toggler) {
            popupMenu.style.display = "none";
            toggler = false

        } else {
            popupMenu.style.display = "flex";
            toggler = true
        }
    });
</script>