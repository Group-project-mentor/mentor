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
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL?>public/assets/clips/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL?>public/assets/clips/logo1.png" alt="logo" />
                </div>
            </div>

                 <!-- Navigation buttons -->
                 <div class="nav-links">
                <a href="<?php BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/icons/icon_class.png" alt="home">
                    <div class="nav-link-text">Classes</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_premium.png" alt="cource">
                    <div class="nav-link-text">Buy Premium</div>
                </a>
                <a href="<?php BASEURL ?>privateclass/report" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_report.png" alt="profile">
                    <div class="nav-link-text">Report Issue</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_billing.png" alt="report">
                    <div class="nav-link-text">Billing</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
                <a href="<?php BASEURL ?>st_profile/Scholarship_page1" class="nav-link">
                    <img src="<?php echo BASEURL?>public/assets/icons/Scholarship.png" alt="bmc">
                    <div class="nav-link-text">Get scholarship</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>public/assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

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
                            <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" 
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