<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_dashboard.css">



</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="ad_mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
            <h1>Dashboard</h1>
            <h6>Welcome to Mentor Dashboard</h6>
        </div>
        <div class="ad_section1">
            <div class="ad_cards">
                <div class="box" id="st">
                    <div class="imgrow">
                        <div background-img src="<?php echo BASEURL ?>assets/admin/Ellipse.png">
                            <img class="mini" src="<?php echo BASEURL ?>assets/admin/students.png">
                        </div>
                        <div class="typeNcount">
                            <div class="boxtitle">
                                <h1>Total<br>Students </h1><br>
                            </div>
                            <div class="count">
                                <h1>
                                    
                                    <?php 
                                    if (!$data['studentCount']) {
                                        echo '0';
                                    } else {
                                        echo $data['studentCount']; 
                                    }
                                    ?><br>
                                    
                                </h1>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="box" id="tc">
                    <div class="imgrow">
                        <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                            <img class="mini" src="<?php echo BASEURL ?>assets/admin/teacher.png">
                        </div>
                        <div class="typeNcount">
                            <div class="boxtitle">
                                <h1>Total<br>Teachers</h1><br>
                            </div>
                            <div class="count">
                                <h1>
                                    <?php 
                                    if (!$data['teacherCount']) {
                                        echo '0';
                                    } else {
                                        echo $data['teacherCount']; 
                                    }
                                    ?><br>
                                </h1>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="box" id="pc">
                    <div class="imgrow">
                        <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                            <img class="mini" src="<?php echo BASEURL ?>assets/admin/teaching.png">
                        </div>
                        <div class="typeNcount">
                            <div class="boxtitle">
                                <h1>Total Private Classes</h1><br>
                            </div>
                            <div class="count">
                                <h1>
                                    <?php 
                                    if (!$data['classCount']) {
                                        echo '0';
                                    } else {
                                        echo $data['classCount']; 
                                    }
                                    ?><br>
                                </h1>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box" id="sp">
                    <div class="imgrow">
                        <div background="<?php echo BASEURL ?>assets/admin/Ellipse 1.png">
                            <img class="mini" src="<?php echo BASEURL ?>assets/admin/sponsor.png">
                        </div>
                        <div class="typeNcount">
                            <div class="boxtitle">
                                <h1>Total<br>Sponsors</h1><br>
                            </div>
                            <div class="count">
                                <h1>
                                    <?php 
                                    if (!$data['sponsorCount']) {
                                        echo '0';
                                    } else {
                                        echo $data['sponsorCount']; 
                                    }
                                    ?><br>
                                </h1>
                            </div>
                        </div>
                    </div>



                </div>
            </div>



            <div class="ad_section2">
                <div class="earnings">
                    <img class="ern" src="<?php echo BASEURL ?>assets/admin/earnings.png">
                </div>
                <div class="bgbox">
                    <div class="complaints">
                        <div class="title">
                            <h1>Complaints</h1>
                        </div>
                        <div class="btn">
                            <button type="button">
                                <p><a href="<?php echo BASEURL ?>admins/complaints" style="color:white;">View All</a></p>
                            </button>
                        </div>

                    </div>
                    <?php
                    if (!$data['complaints']) {
                        echo 'No Complaints';
                    } else {
                        foreach ($data['complaints'] as $value) {
                            echo '<div class="content">
                                <div class="complaints">
                                    <div class="pp">
                                        <img class="profile" src="' . BASEURL . 'assets/admin/pp.png">
                                    </div>
                                    <div class="name" id="user-name">
                                        <p>' . $value['name'] . '</p>
                                    </div>
                                    <div class="userid" id="user-id">
                                        <p>' . $value['id'] . '</p>
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                    <!--  -->
                </div>
            </div>
            <div class="ad_section3">
                <div class="bgbox">
                    <div class="task">
                        <div class="task-top">
                            <div class="title">
                                <h1>Task Manager</h1>
                            </div>
                            <div class="btn">
                                <a href="<?php echo BASEURL ?>admins/taskmanager">
                                    <button type="button">View All</button>
                                </a>
                            </div>
                        </div>
                        <?php
                        if (!$data['rtask']) {
                            
                        } else {
                            foreach ($data['rtask'] as $value) {
                                echo '<div class="content">
                                    <div class="complaints">
                                        <div class="pp">
                                            <img  class="profile" src="' . BASEURL . 'assets/admin/reviewresource.png">
                                        </div>
                                        <div class="name">
                                            <p>Review Resource</p>
                                        </div>
                                        <div class="userid" id="user-id">
                                            <p>' . $value['type'] . '</p>
                                        </div>
                                    </div>
                                </div>';
                            }
                        }

                        if (!$data['ctask']) {
                            
                        } else {
                            foreach ($data['ctask'] as $value) {
                                echo '<div class="content">
                                 <div class="complaints">
                                    <div class="pp">
                                        <img  class="profile" src="' . BASEURL . 'assets/admin/comphand.png">
                                    </div>
                                    <div class="name">
                                        <p>Complaint Handling</p>
                                    </div>
                                    <div class="userid" id="user-id">
                                        <p>' . $value['description'] . '</p>
                                    </div>
                                     
                                
                                </div>
                            </div>';
                            }
                        }
                        ?>
                        
                    </div>
                </div>
               

            </div>
           
            <div class="ad_section5">
                <div class="bgbox">
                    <div class="addgradesub">
                        <div class="title">
                            <h1>Add New Grade or Subject</h1>
                        </div>
                        <div class="btn-sec5">
                            <div class="btn-5">
                                <a href="<?php echo BASEURL ?>admins/addgrades">
                                    <p style="font-size: larger;">Add Grade</p>
                                </a>
                            </div>
                            <div class="btn-5">
                                <a href="<?php echo BASEURL ?>admins/addsubject">
                                    <p style="font-size: larger;">Add Subject</p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </section>
    <style>
        .tab {
            padding: 5px 10px;
        }
    </style>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>



</body>

<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    // let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            // navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            // navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })

    const profileBtn = document.getElementById("profile-btn");
    const popupMenu = document.getElementById("popup-menu")
    let toggler = false;

    profileBtn.addEventListener('click', () => {
        if (toggler) {
            popupMenu.style.display = "none";
            toggler = false

        } else {
            popupMenu.style.display = "flex";
            toggler = true
        }
    });
</script>