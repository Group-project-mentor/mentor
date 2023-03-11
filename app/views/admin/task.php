<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/admin/ad_task.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/admin/style.css">
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
                    <h1>Task Manager</h1>
                </div>

                <div class="content">
                    <a href="<?php echo BASEURL?>admins/task/t001" style="text-decoration: none; color:black;">
                        <div class="complaints">
                            <div class="pp">
                                <img  class="profile" src="<?php echo BASEURL?>assets/admin/comphand.png">
                            </div>
                            <div class="name">
                                <p>Complaint Handling</p>
                            </div>
                            <div class="description">
                                <p>jahsgfbdssauygefiBCJHBVCGDUDSSDFCSJH FUSHDFUJHFH</p>
                            </div>
                            <div class="icons">
                                <div class="view">
                                    <button type="button" id="btn">In Pogress</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo BASEURL?>admins/complaintaction" style="text-decoration: none; color:black;">
                        <div class="complaints">
                            <div class="pp">
                                <img  class="profile" src="<?php echo BASEURL?>assets/admin/comphand.png">
                            </div>
                            <div class="name">
                                <p>Complaint Handling</p>
                            </div>
                            <div class="description">
                                <p>jahsgfbdssauygefiBCJHBVCGDUDSSDFCSJH FUSHDFUJHFH</p>
                            </div>
                            <div class="icons">
                                <div class="view">
                                    <button type="button" id="btn">In Pogress</button>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo BASEURL?>adComplaintaction" style="text-decoration: none; color:black;">
                        <div class="complaints">
                            <div class="pp">
                                <img  class="profile" src="<?php echo BASEURL?>assets/admin/comphand.png">
                            </div>
                            <div class="name">
                                <p>Complaint Handling</p>
                            </div>
                            <div class="description">
                                <p>jahsgfbdssauygefiBCJHBVCGDUDSSDFCSJH FUSHDFUJHFH</p>
                            </div>
                            <div class="icons">
                                <div class="view">
                                    <button type="button" id="btn">In Pogress</button>
                                </div>
                            </div>
                        </div>
                    </a>
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

            