<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate reports</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">
    <style>
        .resource-chart {
            max-width: 400px;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_profile/generate_report">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Hello <?php echo $_SESSION['name'] ?> !</h2>
                    <h3>These are the Reports Of your Private Classes. You Can</h3>
                </div>

                <!-- bottom part -->
                <section class="bottom-section-grades">
                    <div class="sponsor-student-prof">

                        <div class="bottom-details" style="margin: 10px 10px;height: 50vh; padding-top: 100px;">
                            <h2>Your Private Classes Reports</h2>

                            <div>
                                <!-- new data from DB -->
                                <?php if (!empty($data[0])) { ?>
                                    <div class="subject-card-set">
                                        <?php foreach (array_slice($data[0], 0, 3) as $row) { ?>
                                            <a href="<?php echo BASEURL . "st_profile/generate_report_private_class/" . $row->class_name ?> " style="text-decoration: none; color:black;" >
                                                <div class="rc-dash-info-card">
                                                    <h2><?php echo $row->class_name ?></h2>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>

                                <?php } else {
                                    echo "no data!";
                                } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>

    </section>
    </section>

    </div>
    </section>
</body>


</html>