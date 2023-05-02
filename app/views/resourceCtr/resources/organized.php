<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
<?php include_once "components/alerts/rc_delete_alert.php"?>
<?php
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        $message = "Operation Successful !";
        include_once "components/alerts/operationSuccess.php";
    }
    if ($_SESSION['message'] == "failed") {
        $message = "Operation Failed !";
        include_once "components/alerts/operationFailed.php";
    }
}
?>

<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>

    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php" ?>

    <div class="content-area">

        <!-- ? Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- ? Middle part for whole content -->
        <section class="mid-content">

            <!-- ? Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / resources</h6>
            </div>

            <!-- ? Buttons and other info -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>RESOURCES</h1>
                    <div style="display:flex;">
                        <a href="<?php echo BASEURL . 'rcAdd/newTopic/'.$_SESSION['gid'].'/'.$_SESSION['sid'] ?>" style="display:flex;justify-content:center;align-items:center;">
                            <div class="rc-add-btn">
                                <img src="<?php echo BASEURL ?>public/assets/icons/add_teacher.png" alt="" style="width:20px;margin-right:10px;">
                                Add
                            </div>
                        </a>
                        <a id="saveButton" style="display:flex;justify-content:center;align-items:center;">
                            <div class="rc-add-btn">
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon-save-white.png" alt="" style="width:20px;margin-right:10px;">
                                Save
                            </div>
                        </a>
                        <div class="rc-add-btn" id="editToggle">
                            <img id="editToggleImg" src="<?php echo BASEURL ?>public/assets/icons/icon_move.png" style="width:25px;">
                        </div>
                    </div>
                </div>

                <!-- ? All resources rendering inside this -->
                <div class="rc-resource-table" id="resourceContainer">
                </div>
            </div>
        </section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL?>";
    let topicData = <?php echo json_encode($data[0]) ?>;
    let topicOrderStr = <?php echo json_encode($data[1]) ?>;
</script>
<script src="<?php echo BASEURL . '/public/javascripts/organizedResources.js' ?>"></script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>
</html>