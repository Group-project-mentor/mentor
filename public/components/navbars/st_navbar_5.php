<!-- Navigation bar for private resources pages -->


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
            <img src="<?php echo BASEURL ?>assets/icons/off-button.png" alt="report">
            <div class="nav-link-text">Public</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_mode" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/on-button.png" alt="report">
            <div class="nav-link-text">Private</div>
        </a>
    </div>

    <?php
    $class_id = $_SESSION['class_id'];
    ?>


    <!-- Navigation buttons -->
    <div class="nav-links">
        <a href="<?php echo BASEURL ?>st_private_mode" class="nav-link">
            <img src="<?php echo BASEURL; ?>assets/icons/icon_resources.png" alt="cource">
            <div class="nav-link-text">Classes</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_resources/index_videos/<?php echo "$class_id"; ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_video.png" alt="Subjects">
            <div class="nav-link-text">Videos</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_resources/index_quizzes/<?php echo "$class_id"; ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_quizzes.png" alt="Subjects">
            <div class="nav-link-text">Quizzes</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_resources/index_past_papers/<?php echo "$class_id"; ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_past_papers.png" alt="Subjects">
            <div class="nav-link-text">Past Papers</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_resources/index_documents/<?php echo "$class_id"; ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_pdf.png" alt="Subjects">
            <div class="nav-link-text">PDFs</div>
        </a>
        <a href="<?php echo BASEURL ?>st_private_resources/index_others/<?php echo "$class_id"; ?>" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_other.png" alt="Subjects">
            <div class="nav-link-text">Other resources</div>
        </a>
        <a href="<?php echo BASEURL ?>st_report_main" class="nav-link">
            <img src="<?php echo BASEURL ?>assets/icons/icon_report.png" alt="report">
            <div class="nav-link-text">Report Issue</div>
        </a>
    </div>

    <!-- Navigation bar toggler -->
    <div class="nav-toggler" id="nav-toggler">
        <img src="<?php echo BASEURL ?>public/assets/icons/toggler.png" alt="toggler">
    </div>
</nav>

<script src="<?php echo BASEURL . '/public/javascripts/st_navbar_1.js' ?>"></script>