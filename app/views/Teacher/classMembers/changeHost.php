<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Change host</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
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
                <a href="<?php BASEURL ?>TClassMembers/memDetails" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                </a>
                <a href="<?php BASEURL ?>TResources/resource" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_resources.png" alt="home">
                    <div class="nav-link-text">Resources</div>
                </a>
                <a href="<?php BASEURL ?>TInsideClass/addTr" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_teacher.png" alt="home">
                    <div class="nav-link-text">Add Teacher</div>
                </a>
                <a href="<?php BASEURL ?>TInsideClass/addSt" class="nav-link" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_student.png" alt="home">
                    <div class="nav-link-text">Add Student</div>
                </a>
                <a href="<?php BASEURL ?>TReport/generateReport" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/generate_report.png" alt="home">
                    <div class="nav-link-text">Generate Reports</div>
                </a>
                <a href="<?php BASEURL ?>TResources/forum" class="nav-link">
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
                
                <div class="top-bar-btns">
                    <a href="#">
                    <a class="back-btn" href="<?php echo BASEURL ?>privateclass/InsideClass">Back</a>
                    </a>
                    <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Change Host</h1>
                    <h6>Teacher Home/ Members details/change host</h6>
                    <br><br><br>
                    <h3>First, enter your details</h3>
                </div>

                <div class="class section">
                    <form>
                      <label for="class_name"></label>
                      <input type="text" id="user_name" name="user name" placeholder="Enter user name..">
                    
                      
                    </form>
                  </div>

                  <div class="class section">
                    <form>
                      <label for="class_name"></label>
                      <input type="text" id="user_id" name="user id" placeholder="Enter user id..">
                    
                      <input type="submit" value="next">
                    </form>
                  </div>

            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/clips/change host.png" alt="lap man">
                </div>
            </section>


            
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