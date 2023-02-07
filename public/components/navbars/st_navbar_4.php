<!-- navigation bar for profile of student -->

<nav class="nav-bar" id="nav-bar">

    <!-- Navigation bar logos -->
    <div class="nav-upper">
        <div class="nav-logo-short">
            <img src="<?php echo BASEURL ?>public/assets/clips/logo2.png" alt="logo" />
        </div>
        <div class="nav-logo-long" id="nav-logo-long">
            <img src="<?php echo BASEURL ?>public/assets/clips/logo1.png" alt="logo" />
        </div>
    </div>

    <!-- Navigation bar private - public switch -->
    <div class="nav-middle" id="nav-middle">
        
        <div class="nav-switch">
        <p>Public</p>
            <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>
        </div>
        
        <div class="nav-switch">
        <p >Private</p>
            <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>
        </div>
        
    </div>

    <!-- Navigation buttons -->
    <div class="nav-links">
        <a href="<?php BASEURL ?>st_profile" class="nav-link">
            <img class="active" src="<?php echo BASEURL ?>public/assets/icons/icon_class.png" alt="home">
            <div class="nav-link-text">Classes</div>
        </a>
        <a href="<?php BASEURL ?>privateclass/report" class="nav-link">
            <img src="<?php echo BASEURL ?>public/assets/icons/icon_report.png" alt="profile">
            <div class="nav-link-text">Report Issue</div>
        </a>
        <a href="<?php BASEURL ?>st_billing" class="nav-link">
            <img src="<?php echo BASEURL ?>public/assets/icons/icon_billing.png" alt="report">
            <div class="nav-link-text">Billing</div>
        </a>
        <a href="<?php BASEURL ?>st_buy" class="nav-link">
            <img src="<?php echo BASEURL ?>public/assets/icons/icon_bmc.png" alt="bmc">
            <div class="nav-link-text">Buy me a coffee</div>
        </a>
        <a href="<?php BASEURL ?>st_profile/Scholarship_page1" class="nav-link">
            <img src="<?php echo BASEURL ?>public/assets/icons/Scholarship.png" alt="bmc">
            <div class="nav-link-text">Get scholarship</div>
        </a>
    </div>


    <!-- Navigation bar toggler -->
    <div class="nav-toggler" id="nav-toggler">
        <img src="<?php echo BASEURL ?>public/assets/icons/toggler.png" alt="toggler">
    </div>
</nav>

<script src="<?php echo BASEURL . '/public/javascripts/st_navbar_1.js' ?>"></script>
