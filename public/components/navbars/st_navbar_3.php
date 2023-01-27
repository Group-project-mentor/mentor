<!-- navigation bar for priavte student mode -->


<nav class="nav-bar" id="nav-bar">

    <!-- Navigation bar logos -->
    <div class="nav-upper">
        <div class="nav-logo-short">
            <img src="<?php echo BASEURL; ?>assets/clips/logo2.png" alt="logo" />
        </div>
        <div class="nav-logo-long" id="nav-logo-long">
            <img src="<?php echo BASEURL; ?>assets/clips/logo1.png" alt="logo" />
        </div>
    </div>


    <!-- Navigation bar private - public switch -->
    <div class="nav-middle" id="nav-middle">
        <p>Public</p>
        <div class="nav-switch">
            <label class="switch">
                <input type="checkbox" checked>
                <span class="slider round"></span>
            </label>
        </div>
        <p class="nav-switch-txt">Private</p>
    </div>


    <!-- Navigation buttons -->
    <div class="nav-links">
        <a href="<?php echo BASEURL ?>st_classroom_inside" class="nav-link">
            <img src="<?php echo BASEURL; ?>assets/icons/icon_resources.png" alt="cource">
            <div class="nav-link-text">Classes</div>
        </a>
        <a href="<?php echo BASEURL ?>st_report_main" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
            <div class="nav-link-text">Report Issue</div>
        </a>
        <a href="<?php echo BASEURL ?>st_buy" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
            <div class="nav-link-text">Buy me a coffee</div>
        </a>
        <a href="<?php echo BASEURL ?>#" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_billing" alt="bmc">
            <div class="nav-link-text">Billing</div>
        </a>
        <a href="<?php echo BASEURL ?>#" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/Settings" alt="bmc">
            <div class="nav-link-text">Settings</div>
        </a>
    </div>

    <!-- Navigation bar toggler -->
    <div class="nav-toggler" id="nav-toggler">
        <img src="<?php echo BASEURL; ?>assets/icons/toggler.png" alt="toggler">
    </div>
</nav>