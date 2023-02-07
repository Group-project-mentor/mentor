<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/t_profile.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                    <a href="<?php echo BASEURL?>logout">
                        <div class="back-btn">Log Out</div>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Student Profile</h1>
                </div>

                <div class="rc-profile">
                    <div class="rc-profile-main">
                        <div class="rc-profile-image " >
                            <img src="<?php echo BASEURL?>public/assets/clips/profile_img.webp" 
                                 alt="profile"
                                 id="profileImg"
                                 class="rc-profile-img-hidden" />
                            <span class="rc-profile-change-btn" id="changeBtn">Change</span>
                        </div>
                        <div class="rc-profile-table">
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    User id
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        10000
                                    </div>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    first name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Nimal
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    last name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Kumara
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Display name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        Nimal Kumara
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Email
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        nimalkumara5@gmail.com
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Mobile number
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        0705298767
                                    </div>
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Update password
                                </div>
                                <div class="rc-profile-right">
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                            <div class="rc-profile-row txt-red">
                                <div class="rc-profile-left">
                                    Delete account
                                </div>
                                <div class="rc-profile-right">
                                    <a>
                                        >
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    let navMiddle = getElement("nav-middle");
    
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        }

        else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    });

    let profileImg = getElement('profileImg');
    let changeBtn = getElement('changeBtn');

    profileImg.addEventListener('mouseover',()=>{
        profileImg.classList.add('rc-profile-img-hidden');
        changeBtn.classList.remove('hidden');
    });

    profileImg.addEventListener('mouseout',()=>{
        profileImg.classList.remove('rc-profile-img-hidden');
        changeBtn.classList.add('hidden');
    })






</script>

</html>