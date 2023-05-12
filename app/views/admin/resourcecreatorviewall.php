<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaintHandle.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/massage.css">
</head>

<body>
<?php require_once("C:/xampp/htdocs/mentor/public/components/alerts/admin/addRCToTM.php"); ?>
<?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
        <section class="mid-content ad_mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Resource Creators</h1> 
            </div>

            <div class="content">
                <?php
                if (!$data['appliedrc']) {
                    echo 'No Applied Resource Creators';
                } else {
                    foreach ($data['appliedrc'] as $value) {
                        echo '<div class="content">
                                    <div class="complaints">
                                        <div class="pp">
                                            <img class="profile" src="' . BASEURL . 'assets/admin/pp.png">
                                        </div>
                                        <div class="name" id="user-name">
                                            <p>' . $value['firstName'] . '</p>
                                        </div>
                                        <div class="userid" id="user-id">
                                            <p>' . $value['email'] . '</p>
                                        </div>
                                        <div class="description" id="user-description">
                                            <p>' . $value['description'] . '</p>
                                </div>
                                <div class="icons">
                                    <div class="view">
                                        <a href="'. BASEURL .'admins/resourceCreatorView/' . $value['id'].'"><img src="'. BASEURL .'assets/admin/view.png"></a>
                                    </div>
                                    <div class="addtm">
                                        <button class="comp-btns" onclick="addRCToTaskManager(' . $data['appliedrc'][0]['id'] . ')" type="button"><img src="'. BASEURL .'assets/admin/addtm.png"></button>
                                    </div>
                                </div>
                                    </div>
                                </div>';
                            
                    }
                }
                ?>
                
            </div>
        </section>
    </div>
</section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>
</body>
<script src="<?php echo BASEURL ?>javascripts/admin/cors.js"></script>
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