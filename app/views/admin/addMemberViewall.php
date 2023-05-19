<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">

</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="ad_mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
            <h1>Add members to your Team</h1>
        </div>

        <div class="content">
            <?php
            foreach ($data['admin'] as $value) {
                echo '<div class="content">
                            <div class="complaints">
                                <div class="pp">
                                    <img class="profile" src="' . BASEURL . 'assets/admin/pp.png">
                                </div>
                                <div class="name" id="user-name">
                                    <p>' . $value['name'] . '</p>
                                </div>
                                <div class="userid" id="user-id">
                                    <p>' . $value['admin_id'] . '</p>
                                </div>
                                <div class="description" id="user-description">
                                    <p>' . $value['email'] . '</p>
                        </div>
                        <div class="icons">
                            <div class="addtm">
                                <img src="' . BASEURL . 'assets/admin/addtm.png">
                            </div>
                            <div class="delete">
                                <a href="' . BASEURL . '#"><img src="' . BASEURL . 'assets/admin/Delete.png"></a>
                            </div>
                        </div>
                            </div>
                        </div>';
            }
            ?>

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