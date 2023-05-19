<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_task.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/massage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/public/components/alerts/admin/deleteComptm.php"); ?>

    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
    <!-- Middle part for whole content -->
    <section class="ad_mid-content">

        <!-- Title and sub title of middle part -->
        <div class="mid-title">
            <h1>Task Manager</h1>
        </div>
        <div class="content">
            <?php
            if (!$data['rtask']) {
            } else {
                foreach ($data['rtask'] as $value) {
                    echo
                    '<div class="content" >
                        <div class="complaints">
                            <div class="pp">
                                <img src="' . BASEURL . 'assets/admin/RV/resource.svg">
                            </div>
                            <div class="name">
                                <p>Review Resource</p>
                            </div>
                            <div class="userid" id="user-id">
                                <p>' . $value['type'] . '</p>
                            </div>
                        
                                        
                            <div class="btns">
                                <div class="view">
                                    <a href="' . BASEURL . 'admins/resource/' . $value['type'] . '/' . $value['id'] . '" class ="comp-btns">Start</a>
                                </div>
                                <div class="delete">
                                    <button class="comp-btns" onclick="deleteResourceFromTaskManager(' . $value['id'] . ')" type="button">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }

            if (!$data['ctask']) {
                
            } else {
                foreach ($data['ctask'] as $value) { ?>
                    <?php //print_r($value) 
                    ?>
                    <div class="content">
                        <div class="complaints">
                            <?php if ($value['status'] == "in Progress") { ?>
                                <div class="pp">
                                    <img src="<?php echo BASEURL . 'assets/admin/RV/comlaint.svg' ?>">
                                </div>
                            <?php } else { ?>
                                <div class="pp">
                                    <img src="<?php echo BASEURL . 'assets/admin/warn.png' ?>">
                                </div>
                            <?php } ?>
                            <div class="name">
                                <p>Complaint Handling</p>
                            </div>
                            <div class="userid" id="user-id">
                                <p><?php echo $value['description'] ?></p>
                            </div>

                            <div class="btns">
                                <?php if ($value['status'] == "in Progress") { ?>
                                    <div class="view">
                                        <a href="<?php echo BASEURL . 'admins/ComplaintReview/detail/' . $value['work_id'] ?>">Continue</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="view">
                                        <a href="<?php echo BASEURL . 'admins/ComplaintReview/detail/' . $value['work_id'] ?>">Start</a>
                                    </div>
                                    <div class="delete">
                                        <button class="comp-btns" onclick="deleteComplaintFromTaskManager('<?php echo $value['work_id'] ?>')" type="button">Delete</button>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>

            <?php    }
            }

            if (!$data['rctask']) {
            } else {
                foreach ($data['rctask'] as $value) {
                    echo '<div class="content">
                                    <div class="complaints">
                                        <div class="pp">
                                            <img src="' . BASEURL . 'assets/admin/RV/RC.svg">
                                        </div>
                                        <div class="name">
                                            <p>Approve Resource Creators</p>
                                        </div>
                                        <div class="userid" id="user-id">
                                            <p>' . $value['description'] . '</p>
                                        </div>
                                        
                                <div class="btns">
                                    <div class="view">
                                        <a href="' . BASEURL . 'admins/resourceCreatorReview/details/' . $value['id'] . '">Start</a>
                                    </div>
                                    <div class="delete">
                                        <button class="comp-btns" onclick="deleteRCFromTaskManager(' . $value['id'] . ')" type="button">Delete</button>
                                    </div>
                                </div>
                                    </div>
                                </div>';
                }
            }

            if (!$data['schltask']) {
            } else {
                foreach ($data['schltask'] as $value) {
                    echo '<div class="content">
                                    <div class="complaints">
                                        <div class="pp">
                                            <img src="' . BASEURL . 'assets/admin/RV/scholor.svg">
                                        </div>
                                        <div class="name">
                                            <p>Scholorship Approval</p>
                                        </div>
                                        <div class="userid" id="user-id">
                                            <p>' . $value['firstName'] . '</p>
                                        </div>
                                        
                                <div class="btns">
                                    <div class="view">
                                        <a href="' . BASEURL . 'admins/SchlReview/details/' . $value['id'] . '">Start</a>
                                    </div>
                                    <div class="delete">
                                        <button class="comp-btns" onclick="deleteScholToTaskManager(' . $value['id'] . ')" type="button">Delete</button>
                                    </div>
                                </div>
                                    </div>
                                </div>';
                }
            }

            if (!$data['sptask']) {
            } else {
                foreach ($data['sptask'] as $value) {
                    echo '<div class="content">
                                    <div class="complaints">
                                        <div class="pp">
                                            <img src="' . BASEURL . 'assets/admin/RV/sponsor.svg">
                                        </div>
                                        <div class="name">
                                            <p>Sponsor Approval</p>
                                        </div>
                                        <div class="userid" id="user-id">
                                            <p>' . $value['firstName'] . '</p>
                                        </div>
                                        
                                <div class="btns">
                                    <div class="view">
                                        <a href="' . BASEURL . 'admins/SponsorReview/details/' . $value['id'] . '">Start</a>
                                    </div>
                                    <div class="delete">
                                        <button class="comp-btns" onclick="deleteSPFromTaskManager(' . $value['id'] . ')" type="button">Delete</button>
                                    </div>
                                </div>
                                    </div>
                                </div>';
                }
            }


            ?>

        </div>
    </section>
    </div>
    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>
</body>
<script src="<?php echo BASEURL ?>javascripts/admin/cors.js"></script>

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
</script>