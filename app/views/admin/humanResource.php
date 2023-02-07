<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_humanresource.css">
    
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
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/admin/Ellipse 2.png" alt="profile">
                    </a>
                </div>
            </section>
            <!-- Middle part for whole content -->
            <section class="mid-content ad_mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Human Resource</h1>
                    <h6>Welcome to Mentor Human Resouse page</h6>
                </div>

                <div class="hr" id="rc">
                    <div class="bgbox">
                        <div class="team">
                            <div class="title">
                                <h1>Resource Creators</h1>
                            </div>
                            <div class="btn">
                                <button class="btns" type="button">
                                    <p>View All</p>
                                </button>
                                <button class="btns" type="button">
                                    <p>Add New</p>
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="hr" id="team">
                    <div class="bgbox">
                        <div class="team">
                            <div class="title">
                                <h1>co-Admins</h1>
                            </div>
                            <div class="btn">
                                <a class="btns" type="button" >
                                    View All
                                </a>
                                <a class="btns" href="<?php echo BASEURL ?>adAddnewadmin">
                                Add New
                                </a>
                            </div>

                        </div>
                        <div class="users">
                            <?php if (!empty($data[0])) { ?>
                                <?php foreach ($data[0] as $row) { ?>
                                    <div class="subject-card">
                                        <img src="<?php echo BASEURL ?>assets/admin/user.png" width="5%" height="5%" />
                                        <a href="#"><label> <?php echo $row['name'] ?></label></a>

                                    </div>
                                <?php } ?>
                        </div>
                    <?php } else {
                                echo "no data";
                            } ?>


                    </div>
                </div>


        </div>


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
</script>