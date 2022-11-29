 <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>assets/logos/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>assets/logos/logo1.png" alt="logo" />
                </div>
            </div>


            <!-- Navigation bar private - public switch -->
            <div class="nav-middle" id="nav-middle">
                <p>Public</p>
                <div class="nav-switch">
                    <label class="switch">
                        <input type="checkbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <p class="nav-switch-txt">Private</p>
            </div>

            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL . 'home' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_home.png" alt="home">
                    <div class="nav-link-text">Home</div>
                </a>
                <a href="<?php echo BASEURL . 'subjects' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_cources.png" alt="cource">
                    <div class="nav-link-text">Subjects</div>
                </a>
                <!-- <a href="<?php echo BASEURL . 'rcProfile' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile.png" alt="profile">
                    <div class="nav-link-text">Profile</div>
                </a> -->
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
                    <div class="nav-link-text">Report</div>
                </a>
                <a href="#" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <script src="<?php echo BASEURL . '/public/javascripts/rc_navbar.js' ?>"></script>
