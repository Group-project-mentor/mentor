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
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_settings.css">


</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="mid-content ad_mid-content">

        <!-- Title and sub title of middle part -->

        <div class="mid-title">
            <h1>Setting</h1>
            <h6><?php echo $_SESSION['name'] ?></h6>
        </div>
        <?php
        // if ($_SESSION['message'] == 'success') {
        //     include_once "components/alerts/password_changed.php";
        // } else if ($_SESSION['message'] == 'failed') {
        //     include_once "components/alerts/pwd_change_failed.php";
        // } else if ($_SESSION['message'] == 'wrongPass') {
        //     include_once "components/alerts/pwd_wrong.php";
        // }

        // unset($_SESSION['message']);
        if (!empty($data) && $data == 'success') {
            include_once "components/alerts/password_changed.php";
        } else if (!empty($data) && $data == "failed") {
            include_once "components/alerts/pwd_change_failed.php";
        } else if (!empty($data) && $data == "wrongPass") {
            include_once "components/alerts/pwd_wrong.php";
        }
        ?>

        <div class="content" id="comp-content">

            <form class="form" action="<?php echo BASEURL ?>admins/changePassword" method="POST">
                <div class="mid-title">
                    <h1>Change Password</h1>

                </div>

                <div class="reset">
                    <div class="box">
                        <label for="userid">
                            <div class="tagtitle">
                                <label for="co-useremail" id="co-useremail">Current Password</label><br>
                                <input type="password" class="txt-input" placeholder="Current password" name="cpasswd" /><br>
                                <!-- <input type="email" name="admin-mail" placeholder="   Enter current password" class="inputfield"><br> -->


                            </div>
                        </label><br>

                    </div>


                    <div class="box">
                        <label for="userid">
                            <div class="tagtitle">
                                <label for="co-useremail" id="co-useremail">New Password</label><br>
                                <input type="password" class="txt-input" placeholder="New Password" name="npasswd"  title="password should be exact or more than 8 characters, numbers or symbols." /><br>
                                <!-- <input type="email" name="admin-mail" placeholder="   Enter new password" class="inputfield"><br>pattern="[0-9a-zA-Z!@#$%^&*.?~]{8}" -->


                            </div>
                        </label><br>

                    </div>

                    <div class="box">
                        <label for="userid">
                            <div class="tagtitle">
                                <label for="co-useremail" id="co-useremail">Confirm New Password</label><br>
                                <input type="password" class="txt-input" placeholder="New Password" name="cnfpasswd" title="password should be exact or more than 8 characters, numbers or symbols." /><br>


                            </div>
                        </label><br>

                    </div>

                    <div class="btns">
                        <button class="comp-btns">Update Password</button><br>
                        <br>

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