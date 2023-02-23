<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_popupmenue.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_dashboard.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">

</head>
<nav>
    <div class="ad_nav">

    </div>
</nav>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>assets/admin/minilogo 1.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>assets/admin/logo-w.png" alt="logo" />
                </div>
            </div>


            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL ?>assets/admin/bi_grid-fill.png" alt="dsh">
                    <div class="nav-link-text">Dashboard</div>
                </a>
                <a href="<?php echo BASEURL ?>adhumanResource" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_people-fill.png" alt="hr">
                    <div class="nav-link-text">Human Resource</div>
                </a>
                <a href="<?php echo BASEURL ?>adVerification" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_patch-check-fill.png" alt="vc">
                    <div class="nav-link-text">Verification Center</div>
                </a>
                <a href="<?php echo BASEURL ?>adScholPro" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_mortarboard-fill.png" alt="sp">
                    <div class="nav-link-text">Scholorship Programe</div>
                </a>
                <a href="<?php echo BASEURL ?>adWallet" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/Vector.png" alt="wallet">
                    <div class="nav-link-text">Wallet</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/Vector (1).png" alt="an">
                    <div class="nav-link-text">Analitics</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>assets/admin/toogle.png" alt="toggler">
            </div>
        </nav>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/admin/Vector (2).png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/admin/Vector (3).png" alt="notify">
                    </a>
                    <a id="profile-btn">
                        <img src="<?php echo BASEURL ?>assets/admin/Ellipse 2.png" alt="profile">
                    </a>
                </div>
            </section>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Dashboard</h1>
                    <h6>Welcome to Mentor Dashboard</h6>
                </div>
                <div class="ad_section1">
                    <div class="ad_cards">
                        <div class="box" id="st">
                            <div class="imgrow">
                                <div background-img src="<?php echo BASEURL ?>assets/admin/Ellipse.png">
                                    <img class="mini" src="<?php echo BASEURL ?>assets/admin/3-Friends.png">
                                </div>
                                <div>
                                    <h1>Total Student <br>
                                        5430<br>
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <p>
                                    Public :1467 Students<br>
                                    Private :438 Students
                                </p>
                            </div>
                            <div>

                            </div>
                            <!--<img src="assets/students.png" alt="students">-->
                        </div>
                        <div class="box" id="tc">
                            <div class="imgrow">
                                <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                                    <img class="mini" src="<?php echo BASEURL ?>assets/admin/3-Friends.png">
                                </div>
                                <div>
                                    <h1>Total Teacher<br>
                                        5430<br>
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <p>
                                    Public :1467 Teacher<br>
                                    Private :438 Teacher
                                </p>
                            </div>
                            <div>
                                <hr>
                            </div>

                            <!--<img src="assets/teachers.png" alt="teacher">-->
                        </div>
                        <div class="box" id="pc">
                            <div class="imgrow">
                                <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                                    <img class="mini" src="<?php echo BASEURL ?>assets/admin/3-Friends.png">
                                </div>
                                <div>
                                    <h1>Total Private Classes<br>
                                        5430<br>
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <p>
                                    Paid :1467 Classes<br>
                                    Free :438 Classes
                                </p>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <!--<img src="assets/privateclz.png" alt="students">-->
                        </div>
                        <div class="box" id="sp">
                            <div class="imgrow">
                                <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                                    <img class="mini" src="<?php echo BASEURL ?>assets/admin/3-Friends.png">
                                </div>
                                <div>
                                    <h1>Total Sponsors<br>
                                        5430<br>
                                    </h1>
                                </div>
                            </div>
                            <div>
                                <p>
                                    Monthly :1467 <br>
                                    Anual :438
                                </p>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <!--<img src="assets/sponsors.png" alt="sponsor">-->
                        </div>
                        <div class="box" id="ad">
                            <div class="imgrow">
                                <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                                    <img class="mini" src="<?php echo BASEURL ?>assets/admin/3-Friends.png">
                                </div>
                                <div>
                                    <h1>Total Advertisement<br>
                                        5430
                                    </h1>
                                </div>
                            </div>

                            <div>
                                <hr>
                            </div>
                            <!--<img src="assets/ad.png" alt="ad">-->
                        </div>
                    </div>
                    <div class="ad_section2">
                        <div class="earnings">
                            <img class="ern" src="<?php echo BASEURL ?>assets/admin/earnings.png">
                        </div>
                        <div class="bgbox">
                            <div class="complaints">
                                <div class="title">
                                    <h1>Complaints</h1>
                                </div>
                                <div class="btn">
                                    <button type="button">
                                        <p ><a href="<?php echo BASEURL ?>adComplaintHandle" style="color:white;">View All</a></p>
                                    </button>
                                </div>

                            </div>
                            <div class="content">
                                <div class="c_row">
                                    <div class="pp">

                                    </div>
                                    <div class="">

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="ad_section3">
                        <div class="bgbox">
                            <div class="task">
                                <div class="title">
                                    <h1>Task Manager</h1>
                                </div>
                                <div class="btn">
                                    <a href="<?php echo BASEURL ?>adTask">
                                        <button type="button">View All</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="bgbox">
                            <div class="user">
                                <div class="title">
                                    <h1>User Handling</h1>
                                </div>
                                <div class="btn">
                                    <a href="<?php echo BASEURL ?>adUserHandle">
                                        <p style="color:white">View All</p>
                                    </a>
                                </div>

                            </div>
                            <div class="content">
                                <div class="c_row">
                                    <div class="pp">

                                    </div>
                                    <div class="">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="ad_section4">
                        <div class="bgbox">
                            <div class="team">
                                <div class="title">
                                    <h1>View My Team</h1>
                                </div>
                                <div class="btn">
                                    <button type="button">
                                        <p>View All</p>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <style>
        .tab {
            padding: 5px 10px;
        }
    </style>
    <section id="popup-menu">
        <!-- style="width:150px;display:none;position:absolute;flex-direction:column;top:85px;right:30px;z-index:100;
        background:white;"> -->
        <!-- <div class="tab">
                jhxj
            </div> -->
        <div class="tab" style="border-top-left-radius:20px;border-top-right-radius:20px">
            <a href="<?php echo BASEURL ?>adProfile" class="popup-link">
                <div class="tabcont">
                    <img class="icon" src="<?php echo BASEURL ?>assets/admin/profileicon.png">
                    Profile
                </div>
            </a>
        </div>
        <div class="tab">
            <a href="<?php echo BASEURL ?>adSetting" class="popup-link">
                <div class="tabcont">
                    <img class="icon" src="<?php echo BASEURL ?>assets/admin/settingicon.png">
                    Settings
                </div>
            </a>
        </div>
        <div class="tab">
            <a href="<?php echo BASEURL ?>adActivitylog" class="popup-link">
                <div class="tabcont">

                    <img class="icon" src="<?php echo BASEURL ?>assets/admin/activitylogicon.png">
                    Activity Log
                </div>
            </a>
        </div>
        <div class="tab" style="border-bottom-left-radius:20px;border-bottom-right-radius:20px">
            <a href="<?php echo BASEURL ?>login" class="popup-link">
                <div class="tabcont">
                    <img class="icon" src="<?php echo BASEURL ?>assets/admin/logouticon.png">
                    Logout
                </div>
            </a>
        </div>
    </section>
    </div>


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