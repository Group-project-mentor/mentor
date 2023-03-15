<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_complaints.css">
    

</head>


<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>User Handle</h1>
                </div>

                <div class="content" id="comp-content" >
                    <div class="bckclose">
                        <img class="back" src="<?php echo BASEURL ?>assets/admin/Arrow---Left.png">
                        <img class="close" src="<?php echo BASEURL ?>assets/admin/Close-Square.png">
                    </div>
                    <div class="complaints" id="com-complaints">
                        <div class="pp">
                            <img class="profile" src="<?php echo BASEURL ?>assets/admin/pp.png">
                        </div>
                        <div class="name">
                            <p>Jaydon Aminoff</p>
                        </div>
                    </div>
                    <div id="com-title">
                        <h1>Title goes here</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente expedita fugit culpa optio accusantium mollitia eius deserunt architecto, sit minus maxime minima eos quidem quam nesciunt non veritatis, eum dolores!</p>
                    </div>
                    <div class="btns">
                        <a href="<?php echo BASEURL?>adTask"><button class="comp-btns">Add to task manager</button></a>
                        <button class="comp-btns">Delete</button>    
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