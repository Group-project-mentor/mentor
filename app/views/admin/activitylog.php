<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_addnewadmin.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/massage.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_activitylog.css">


</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="ad_mid-content">

                <!-- Title and sub title of middle part -->

                <div class="mid-title">
                    <h1>Activity Log</h1>
                </div>

                <div class="content" id="comp-content">

                    <form class="form" action="<?php echo BASEURL ?>adAddnewadmin/add" method="POST">
                        <div class="mid-title">
                            
                        </div>

                        <div class="reset">
                            <div class="progressContainer">

                                <header>
                                    <h4>Today- Friday, November 11, 2022</h4>
                                </header>

                                <ul class="progress">
                                    <li class="progress__item progress__item--completed">
                                        <p class="progress__title"> 08.00</p>
                                        <p class="progress__info">Log out</p>
                                    </li>
                                    <li class="progress__item progress__item--active">
                                        <p class="progress__title">07.42</p>
                                        <p class="progress__info">approve resourse creator</p>
                                    </li>
                                    <li class="progress__item">
                                        <p class="progress__title">07.13</p>
                                        <p class="progress__info">review resource</p>
                                    </li>
                                    <li class="progress__item">
                                        <p class="progress__title">06.47</p>
                                        <p class="progress__info">task manager</p>
                                    </li>
                                    <li class="progress__item">
                                        <p class="progress__title">06.40</p>
                                        <p class="progress__info">Login</p>
                                    </li>
                                </ul>

                            </div>







                        </div>




                    </form>

                </div>

            </section>
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