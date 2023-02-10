<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Teacher/t_resources.css">
    <style>
        body {
            background-image: url('../public/assets/clips/HyperspaceMaintenanceDay');
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_3.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL; ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>
            <section>
                <div>
                    <br>
                    <h2>Join with requests</h2>
                    <h4>Join class by accepting requests. <br><br><br></h4>
                </div>
            </section>
            <section>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thimira Galahitiyawa</div>
                    <div class="rc-resource-col">Mathematics</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kavishka Sulakshana</div>
                    <div class="rc-resource-col">Science</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sanduni gunawardhana</div>
                    <div class="rc-resource-col">Dancing</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kanishka Sewwandi</div>
                    <div class="rc-resource-col">IT</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Anushka Perera</div>
                    <div class="rc-resource-col">Sinhala</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
                <div class="rc-pp-row">

                    <img src="<?php echo BASEURL; ?>assets/icons/pdf_resources.png" alt="delete">
                    <div class="rc-resource-col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shithara Kumari</div>
                    <div class="rc-resource-col">Science</div>
                    <div class="rc-resource-col"></div>
                    <div class="rc-quiz-row-btns">
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_delete.png" alt="delete">
                        </button>
                        <button>
                            <img src="<?php echo BASEURL; ?>assets/icons/icon_edit.png" alt="edit">
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script src="<?php echo BASEURL ?>public/javascripts/st_auth_script.js"></script>

</html>