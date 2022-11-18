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

            <?php 
                $gid = $_SESSION["gid"];
                $sid = $_SESSION["sid"]; 
            ?>
            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL?>resources/videos/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>assets/icons/icon_video.png" alt="home">
                    <div class="nav-link-text">Video</div>
                </a>
                <a href="<?php echo BASEURL ?>resources/quizzes/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_quizzes.png" alt="cource">
                    <div class="nav-link-text">Quizzes</div>
                </a>
                <a href="<?php echo BASEURL ?>resources/pastpapers/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_past_papers.png" alt="profile">
                    <div class="nav-link-text">Past papers</div>
                </a>
                <a href="<?php echo BASEURL ?>resources/documents/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_pdf.png" alt="report">
                    <div class="nav-link-text">PDF</div>
                </a>
                <a href="<?php echo BASEURL ?>resources/others/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_other.png" alt="bmc">
                    <div class="nav-link-text">Other resource</div>
                </a>
                <a href="<?php echo BASEURL ?>resources/settings/<?php echo "$gid/$sid"; ?>" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_settings.png" alt="report">
                    <div class="nav-link-text">Settings</div>
                </a>
                <a href="<?php echo BASEURL ?>report" class="nav-link">
                    <img src="<?php echo BASEURL?>assets/icons/icon_report.png" alt="bmc">
                    <div class="nav-link-text">Report issue</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL?>assets/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <script src="<?php echo BASEURL . '/public/javascripts/rc_navbar.js' ?>"></script>
