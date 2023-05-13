<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/admin/ad_complaintHandle.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/admin/style.css">
</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>User Handle</h1>
                </div>

                <div class="content">
                    <div class="complaints">
                        <div class="pp">
                            <img  class="profile" src="<?php echo BASEURL?>assets/admin/pp.png">
                        </div>
                        <div class="name">
                            <p>Jaydon Aminoff</p>
                        </div>
                        <div class="userid">
                            <p>USER011</p>
                        </div>
                        <div class="description">
                            <p>jahsgfbdssauygefiBCJHBVCGDUDSSDFCSJH FUSHDFUJHFH</p>
                        </div>
                        <div class="icons">
                            <div class="view">
                                <a href="<?php echo BASEURL?>adUserHandleView"><img src="<?php echo BASEURL?>assets/admin/view.png"></a>
                            </div>
                            <div class="addtm">
                                <a href="<?php echo BASEURL?>adTask"><img src="<?php echo BASEURL?>assets/admin/addtm.png"></button>
                            </div>
                            <div class="delete">
                                <button type="button"><img src="<?php echo BASEURL?>assets/admin/Delete.png"></button>
                            </div>
                        </div>

                    </div>
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
        }

        else {
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

            