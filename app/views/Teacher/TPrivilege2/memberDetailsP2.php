<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher-Member Details</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Teacher/resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
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
           


        <?php 
                $cid = $_SESSION["cid"];
            ?>



           <!-- Navigation buttons -->
           <div class="nav-links">
                <a href="<?php echo BASEURL ?>TPrivileges/p2MemberDetails/<?php echo "$cid"; ?>"" class="nav-link">
                    <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                
               
                <a href="<?php echo BASEURL ?>TPrivileges/p2AddSt" class="nav-link" class="nav-link">
                    <img class="active" src="<?php echo BASEURL?>public/assets/Teacher/icons/add_student.png" alt="home">
                    <div class="nav-link-text">Add Student</div>
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
                        <a class="back-btn" href="<?php echo BASEURL ?>">Back</a>
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
                    <h1>C136 - Members Details</h1>
                    <h6>Teacher Home/<?php echo $_SESSION['cid'] ?> / Members Details</h6>
                </div>

                <!-- Grade choosing interface -->
               


                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Full Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Role
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Last Access to Class
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">

                                </div>
                            </div>
                            <?php if (!empty($data[2])) { ?>
                                <div class="sponsor-list-row">
                                </div>
                                <?php foreach ($data[2] as $row) {

                                ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            Host Teacher
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            1 second
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            

                                        </div>
                                        
                                    </div>
                                <?php } ?>
                        
                    <?php }  ?>
            
                <!-- Grade choosing interface -->
                            
                            <?php if (!empty($data[1])) { ?>
                                <div class="sponsor-list-row">
                                </div>
                                <?php foreach ($data[1] as $row) {

                                ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            Teacher
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            1 second
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                           

                                        </div>
                  
                                    </div>
                                <?php } ?>
                        
                    <?php } ?>
                    
                    <?php if (!empty($data[0])) { ?>
                                <div class="sponsor-list-row">
                                </div>
                                <?php foreach ($data[0] as $row) {

                                ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            Student
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            1 second
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            <button class="button button1">Restrict</button>

                                            <style>
                                                .button {
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 16px;
                                                    margin: 4px 2px;
                                                    cursor: pointer;
                                                    border-radius: 12px;
                                                }

                                                .button1 {
                                                    background-color: #186537
                                                }

                                                /* Green */
                                            </style>
                                       
                                       <a href="<?php echo BASEURL . 'TPrivileges/p2RmvSt/' . $row->id.  "/" . $_SESSION["cid"]?>  style="
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 16px;
                                                    margin: 4px 2px;
                                                    cursor: pointer;
                                                    border-radius: 12px;
                                                ">     
                                       <button class="button button1" >Remove</button></a>

                                            <style>
                                                .button {
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 16px;
                                                    margin: 4px 2px;
                                                    cursor: pointer;
                                                    border-radius: 12px;
                                                }

                                                .button1 {
                                                    background-color: #186537
                                                }

                                                /* Green */
                                            </style>
                                        </div>
                                    </div>
                                <?php } ?>
                        
                    <?php }  ?>

                    </div>
                </div>
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
        } else {
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
</html>