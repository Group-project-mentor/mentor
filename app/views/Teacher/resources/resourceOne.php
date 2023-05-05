
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/t_resources.css">
</head>

<body>
<section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                <img src="<?php echo BASEURL?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>

            <?php 
                $cid = $_SESSION["cid"];
            ?>



            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>TClassMembers/memDetails/<?php echo "$cid"; ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
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
                <a href="<?php echo BASEURL ?>TResources/forum" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/forum.png" alt="home">
                    <div class="nav-link-text">Create Forum</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>TResources/resource">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>C79 - Science</h1>
                    <h6>My Subjects / C79</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>UPLOAD VIDEOS</h1>
                        
                    </div>
                    <div class="rc-video-card-set">
                        
                    </div>
                </div>

                <div class="rc-upload-box">
                    <form action="" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Upload or drag and drop files
                        </div>
                        <div class="rc-form-group">
                            <label>Add title +</label>
                            <input type="text" />
                        </div>
                        <div class="rc-form-group">
                            <label>Add files +</label>
                            <div>
                                <input type="file">
                                <h3>Drag or choose file</h3>
                            </div>
                        </div>
                        <div class="rc-upload-button">
                            <button>Finish</button>
                        </div>
                    </form>
                </div>

        </div>

    </section>
</body>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        }

        else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })



</script>

</html>