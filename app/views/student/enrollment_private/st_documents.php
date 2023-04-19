<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/Student/st_resources.css">
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_5.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'st_private_resources/index/' . $_SESSION['class_name'] . '/' . $_SESSION['grade']  ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <?php
                    $ggid = $_SESSION['grade'] + 5;
                    ?>
                    <h2><?php echo "Class Name : " . ucfirst($_SESSION['class_name']) . "<br>" . "Grade " . $ggid ?></h2>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">

                    <?php
                    if (!empty($data[0])) { ?>
                        <div class="rc-resource-table">
                            <div class="rc-pp-row rc-pp-row-head">
                                <div class="rc-resource-col">PDF Name</div>
                                <div class="rc-resource-col"> </div>
                                <div class="rc-resource-col"> </div>
                                <div></div>
                            </div>
                            <?php foreach ($data[0] as $row) { ?>
                                <div class='rc-pp-row'>
                                    <!-- <?php var_dump($row); ?> -->
                                    <div class='rc-resource-col' style="display: flex;align-items: center;justify-content: flex-start;">

                                        <div>
                                            <?php echo $row->name ?>
                                        </div>
                                    </div>
                                    <div class="rc-resource-col"></div>
                                    <div class="rc-resource-col"></div>
                                    <div class="rc-quiz-row-btns">
                                        <a href="<?php echo BASEURL . 'st_public_resources/preview/document/' . $row->id ?>">
                                            <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            <?php   }
                        } else { ?>
                            <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php } ?>
                        </div>
                        <?php if (count($data) > 25) { ?>
                            <div class="pagination-set">
                                <div class="pagination-set-left">
                                    <b>25</b> Results
                                </div>
                                <div class="pagination-set-right">
                                    <button>
                                        < </button>
                                            <div class="pagination-numbers">
                                                1 of 10
                                            </div>
                                            <button> > </button>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </section>
</body>

<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>


</html>