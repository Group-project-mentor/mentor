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
                    <img src="<?php echo BASEURL?>assets/logos/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL?>assets/logos/logo1.png" alt="logo" />
                </div>
            </div>

            <?php 
                $gid = $_SESSION["gid"];
                $sid = $_SESSION["sid"]; 
            ?>
            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL?>rcResources/organized/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img class="" src="<?php echo BASEURL?>assets/icons/icon-category.png" alt="category">
                    <div class="nav-link-text">Resources</div>
                </a>
                <a class="nav-link"></a>
                <a href="<?php echo BASEURL?>rcResources/videos/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img class="" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="video">
                    <div class="nav-link-text">Video</div>
                </a>
                <a href="<?php echo BASEURL ?>rcResources/quizzes/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_quizzes.png" alt="quiz">
                    <div class="nav-link-text">Quizzes</div>
                </a>
                <a href="<?php echo BASEURL ?>rcResources/pastpapers/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_past_papers.png" alt="pp">
                    <div class="nav-link-text">Past papers</div>
                </a>
                <a href="<?php echo BASEURL ?>rcResources/documents/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_pdf.png" alt="pdf">
                    <div class="nav-link-text">PDF</div>
                </a>
                <a href="<?php echo BASEURL ?>rcResources/others/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_other.png" alt="other">
                    <div class="nav-link-text">Other resource</div>
                </a>
<!--                <a href="--><?php //echo BASEURL ?><!--rcResources/settings/--><?php //echo "$gid/$sid"; ?><!--" class="nav-link">-->
<!--                    <img src="--><?php //echo BASEURL?><!--assets/icons/icon_settings.png" alt="settings">-->
<!--                    <div class="nav-link-text">Settings</div>-->
<!--                </a>-->
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

<script>
    let toggle = <?php echo $_SESSION['navtog'] ?>;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
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
            togglerBtn.classList.add("toggler-rotate");
            for (let i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            nav.classList.remove("nav-bar-small");
            logoLong.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (let i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    }
</script>

