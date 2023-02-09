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
        <a href="<?php echo BASEURL . 'sponsor/student_report' ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_help.png" alt="cource">
            <div class="nav-link-text">Student program</div>
        </a>
        <!-- <a href="<?php echo BASEURL . 'rcProfile' ?>" class="nav-link">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile.png" alt="profile">
                    <div class="nav-link-text">Profile</div>
                </a> -->
        <a href="<?php echo BASEURL . 'sponsor/spPayment1' ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_wallet.png" alt="report">
            <div class="nav-link-text">Donate Funds</div>
        </a>
        <a href="<?php echo BASEURL . 'sponsor/reportIssue' ?>" class="nav-link">
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

<script>
    let toggle = <?php echo $_SESSION['navtog'] ?>;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    // let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener("click", () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            // navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
            <?php $_SESSION['navtog'] = false?>
        } else {
            logoLong.classList.remove("hidden");
            // navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
            <?php $_SESSION['navtog'] = true?>
        }
    });
</script>
