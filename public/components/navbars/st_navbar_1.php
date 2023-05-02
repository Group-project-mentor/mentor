<!-- Navigation bar for basic pages in public mode -->


<nav class="nav-bar" id="nav-bar">

    <!-- Navigation bar logos -->
    <div class="nav-upper">
        <div class="nav-logo-short">
            <img src="<?php echo BASEURL ?>assets/clips/logo2.png" alt="logo" />
        </div>
        <div class="nav-logo-long" id="nav-logo-long">
            <img src="<?php echo BASEURL ?>assets/clips/logo1.png" alt="logo" />
        </div>
    </div>



    <!-- Navigation bar private - public switch -->
    <div class="nav-middle" id="nav-middle">

        <a href="<?php echo BASEURL ?>home" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/on-button.png" alt="report">
            <div class="nav-link-text">Public</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_mode" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/off-button.png" alt="report">
            <div class="nav-link-text">Private</div>
        </a>
    </div>


    <!-- Navigation buttons -->
    <div class="nav-links">

        <a href="<?php echo BASEURL ?>home" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_home.png" alt="report">
            <div class="nav-link-text"> Home</div>
        </a>
        <a href="<?php echo BASEURL ?>st_report_main" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
            <div class="nav-link-text"> Report</div>
        </a>
        <a href="<?php echo BASEURL ?>home/bmc" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
            <div class="nav-link-text">Buy me a coffee</div>
        </a>
    </div>


    <!-- Navigation bar toggler -->
    <div class="nav-toggler" id="nav-toggler">
        <img src="<?php echo BASEURL ?>assets/icons/toggler.png" alt="toggler">
    </div>
</nav>

<script src="<?php echo BASEURL . '/public/javascripts/st_navbar_1.js' ?>"></script>