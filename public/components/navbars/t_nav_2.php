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

<?php 
    $gid = $_SESSION["cid"];
   
?>
            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>TClassMembers/memDetails" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                </a>
                <a href="<?php echo BASEURL ?>TResources/resource" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_resources.png" alt="home">
                    <div class="nav-link-text">Resources</div>
                </a>
                <a href="<?php echo BASEURL ?>TInsideClass/addTr" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_teacher.png" alt="home">
                    <div class="nav-link-text">Add Teacher</div>
                </a>
                <a href="<?php echo BASEURL ?>TInsideClass/addSt" class="nav-link" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_student.png" alt="home">
                    <div class="nav-link-text">Add Student</div>
                </a>
                <a href="<?php echo BASEURL ?>TReport/generateReport" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/generate_report.png" alt="home">
                    <div class="nav-link-text">Generate Reports</div>
                </a>
                <a href="<?php echo BASEURL ?>joinRequests/getRequests/<?php echo "$cid"; ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/forum.png" alt="home">
                    <div class="nav-link-text">Join Requests</div>
                </a>
            </div>

<!-- Navigation bar toggler -->
<div class="nav-toggler" id="nav-toggler">
    <img src="<?php echo BASEURL?>assets/icons/toggler.png" alt="toggler">
</div>
</nav>

<script src="<?php echo BASEURL . '/public/javascripts/rc_navbar.js' ?>"></script>
