<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_humanresource.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
</head>
<nav>
    <div class="ad_nav">

    </div>
</nav>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="mid-content ad_mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
            <h1>Scholoship Programe</h1>
            <h6>Welcome to Mentor Scholoship Programe page</h6>
        </div>

        <div class="hr" id="team">
            <div class="bgbox">
                <div class="team">
                    <div class="title">
                        <h1>Students Applied for Sponsorship Programe</h1>
                    </div>
                    <div class="btn">
                        <a class="btns" href="<?php echo BASEURL ?>admins/scholorshipviews" style="text-decoration:none">
                            View All
                        </a>

                    </div>

                </div>
                <div class="users">

                    <?php
                    foreach ($data['scholarship'] as $value) {
                        echo
                        '<div class="content" id="comp-content">
                            
                            <div class="subject-card">
                                <div class="pp">
                                    <img class="profile" src="' . BASEURL . 'assets/admin/user.png">
                                </div>
                                <div class="name">
                                    <p>' . $value['firstName'] . '</p>
                                </div>
                            </div>
                            
                            <div class="btns">
                                <form action="' . BASEURL . 'admins/scholpro/'. $value['id'].'" method="POST">
                                    <button class="comp-btns">Add to task manager</button>
                                </form><br>
                            </div>
                            
                            

                            
                            
                        </div>';
                    }

                    ?>
                </div>
            </div>

        </div>

        <div class="hr" id="team">
            <div class="bgbox">
                <div class="team">
                    <div class="title">
                        <h1>Sponsors Application</h1>
                    </div>
                    <div class="btn">
                        <a class="btns" href="<?php echo BASEURL ?>admins/sponsorviews" style="text-decoration:none">
                            View All
                        </a>

                    </div>

                </div>
                <div class="users">

                    <?php
                    foreach ($data['sponsors'] as $value) {
                        echo
                        '<div class="content" id="comp-content">
                            
                            <div class="subject-card">
                                <div class="pp">
                                    <img class="profile" src="' . BASEURL . 'assets/admin/user.png">
                                </div>
                                <div class="name">
                                    <p>' . $value['dispName'] . '</p>
                                </div>
                            </div>
                            
                            <div class="btns">
                                <form action="' . BASEURL . 'admins/scholpro/'. $value['id'].'" method="POST">
                                    <button class="comp-btns">Add to task manager</button>
                                </form><br>
                            </div>
                            
                            

                            
                            
                        </div>';
                    }

                    ?>
                </div>
            </div>

        </div>



    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>


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