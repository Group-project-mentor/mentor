<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>change image</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_resources.css">
    <style>
        .rc-profile-change-name{
            max-width: 800px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-top: 50px;
        }
        .rc-profile-change-name button{
            padding: 10px 20px;
        }
        .rc-profile-change-name input{
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- <?php
    // if (!empty($data) && $data == "failed") {
    //     include_once "components/alerts/data_change_failed.php";
    // }
    ?> -->
    
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>

            <!-- Middle part for whole content -->
            <section class="mid-content">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Profile - Change Name</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>

                <form class="rc-profile rc-profile-change-name" method="POST" action="<?php echo BASEURL ?>admins/changeName">
                    <div class="rc-text-inp-grp">
                        <label for="name" class="lbl-input">Name : </label><br>
                        <input 
                            type="text" 
                            class="txt-input" 
                            placeholder="New Name" 
                            value="<?php echo $_SESSION['name'] ?>" 
                            name="name" 
                            pattern="[A-Za-z0-9][A-Za-z0-9 ]+"
                            title="Invalid name !"    />
                    </div>
                    <button type="submit" class="rc-add-btn">Change</button>
                </form>
            </section>

        </div>
    </section>
    </div>
    </section>
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

</html>