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
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_profile.css">

</head>
<nav>
    <div class="ad_nav">

    </div>
</nav>

<body><?php if ($data==1){ ?>
    <section class="notification">
        <div class="message-area">
            <div class="message">
                <div class="message-text">
                    Admin added Successfully !
                </div>
                <div class="message-image">
                    <img src="<?php echo BASEURL ?>assets/admin/com-notification.png" alt="error image">
                </div>
                <div class="message-btn">
                    <a href="<?php echo BASEURL ?>adAddnewadmin">OK</a>
                </div>
            </div>
        </div>
    </section><?php } ?>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->

                <div class="mid-title">
                    <h1>Profile</h1>
                </div>
                

                <div class="content" id="comp-content">
                    
                    <div class="profilepic">
                        <img src="<?php echo BASEURL ?>assets/admin/profile.png" alt="profile">
                    </div>
                    <div class="profilenm">
                        Sanduni Gunawardhana<br>
                        
                    </div>

                </div>
                <div class="content" id="comp-content">
                    
                    <form class="form" action="<?php echo BASEURL ?>adAddnewadmin/add" method="POST">
                        <div class="mid-title">
                            <h1>Information</h1>
                        </div>

                        <div class="info">
                            <div class="l">
                                <label for="userid">
                                    <div class="tagtitle">
                                        User ID
                                        <br>USER1001
                                

                                    </div>
                                 </label><br>     
                                
                            </div>
                            

                            <div class="l">
                                <label for="userid">
                                    <div class="tagtitle">
                                        User Name
                                        <br>Sanduni Gunawardhana
                                

                                    </div>
                                 </label><br>     
                                
                            </div>

                            <div class="l">
                                <label for="userid">
                                    <div class="tagtitle">
                                        email address
                                        <br>sandu@gmail.com
                                

                                    </div>
                                 </label><br>     
                                
                            </div>

                            <div class="l">
                                <label for="userid">
                                    <div class="tagtitle">
                                        Address
                                        <br>No.345,main rd,matara.
                                

                                    </div>
                                 </label><br>     
                                
                            </div>

                            <div class="l">
                                <label for="userid">
                                    <div class="tagtitle">
                                        Mobile Number
                                        <br>07zxxxxxxxx
                                

                                    </div>
                                 </label><br>     
                                
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
</script>