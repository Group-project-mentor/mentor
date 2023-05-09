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
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_verify.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/massage.css">

</head>
<nav>
    <div class="ad_nav">

    </div>
</nav>

<body>
<?php require_once("C:/xampp/htdocs/mentor/public/components/alerts/admin/addRToTM.php"); ?>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Videos</h1>
                </div>

                <div class="content" id="comp-content" >
                    <div class="bckclose">
                        <a href="<?php echo BASEURL ?>adVerification" class="back">
                            <img class="back" src="<?php echo BASEURL ?>assets/admin/Arrow---Left.png">
                        </a>
                    </div>
                    <div class="videos">

                    <?php
                    if (!$data['video']) {
                        echo '0';
                    } else {
                        foreach ($data['video'] as $value) {
                            echo 
                            '<div class ="v-name">
                                    <img class="videoslist" src="'. BASEURL .'assets/admin/videoslist.png">
                                    <p>'. $value['name'] .'</p>
                                    <div class="btns">
                                        <button class="comp-btns" onclick="addResourceToTaskManager('.$value['id'].','.$_SESSION['id'] .')" type="button">Add To Task Manager</button>
                                    </div>
                                </div>';

                        }
                    }
                    ?>
                    </div>
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
</script>