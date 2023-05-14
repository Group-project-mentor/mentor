<link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
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
                <a href="<?php echo BASEURL ?>admins/humanResource" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_people-fill.png" alt="hr">
                    <div class="nav-link-text">Human Resource</div>
                </a>
                <a href="<?php echo BASEURL ?>admins/verify" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_patch-check-fill.png" alt="vc">
                    <div class="nav-link-text">Verification Center</div>
                </a>
                <a href="<?php echo BASEURL ?>admins/scholorships" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/admin/bi_mortarboard-fill.png" alt="sp">
                    <div class="nav-link-text">Scholorship Programe</div>
                </a>
                <a href="<?php echo BASEURL ?>admins/adminAnalytics" class="nav-link">
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
                    <?php include_once "components/notificationIcon.php" ?>
                    <a id="profile-btn">
                        <img src="<?php echo BASEURL ?>assets/admin/Ellipse 2.png" alt="profile">
                    </a>
                </div>
            </section>