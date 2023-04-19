<?php
if (!isset($_SESSION['navtog'])) {
    $_SESSION['navtog'] = true;
}
?>
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
            <!-- <div class="nav-middle" id="nav-middle">
                <p>Public</p>
                <div class="nav-switch">
                    <label class="switch">
                        <input type="checkbox" disabled>
                        <span class="slider round"></span>
                    </label>
                </div>
                <p class="nav-switch-txt">Private</p>
            </div> -->

            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL . 'home' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_home.png" alt="home">
                    <div class="nav-link-text">Home</div>
                </a>
                <a href="<?php echo BASEURL . 'rcSubjects' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_cources.png" alt="cource">
                    <div class="nav-link-text">Subjects</div>
                </a>
                <!-- <a href="<?php echo BASEURL . 'rcProfile' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile.png" alt="profile">
                    <div class="nav-link-text">Profile</div>
                </a> -->
                <a href="<?php echo BASEURL . 'rcProfile/reportIssue' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
                    <div class="nav-link-text">Report Issue</div>
                </a>
                <a href="<?php echo BASEURL . 'home/bmc' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
            </div>


            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <script>
            let toggle = <?php echo $_SESSION['navtog'] ?>;

            const getElement = (id) => document.getElementById(id);

            let togglerBtn = getElement("nav-toggler");
            let nav = getElement("nav-bar");
            let logoLong = getElement("nav-logo-long");
            // let navMiddle = getElement("nav-middle");
            let navLinkTexts = document.getElementsByClassName("nav-link-text");

            toggleFunction();

            togglerBtn.addEventListener("click", () => {
                toggleFunction();
                navToggle();
            });

            function navToggle(){
                fetch("<?php echo BASEURL?>home/toggle");
            }

            function toggleFunction(){
                if (toggle) {
                    nav.classList.add("nav-bar-small");
                    logoLong.classList.add("hidden");
                    // navMiddle.classList.add("hidden");
                    togglerBtn.classList.add("toggler-rotate");
                    for (let i = 0; i < navLinkTexts.length; i++) {
                        navLinkTexts[i].classList.add("hidden");
                    }
                    toggle = false;
                } else {
                    nav.classList.remove("nav-bar-small");
                    logoLong.classList.remove("hidden");
                    // navMiddle.classList.remove("hidden");
                    togglerBtn.classList.remove("toggler-rotate");
                    for (let i = 0; i < navLinkTexts.length; i++) {
                        navLinkTexts[i].classList.remove("hidden");
                    }
                    toggle = true;
                }
            }
        </script>
