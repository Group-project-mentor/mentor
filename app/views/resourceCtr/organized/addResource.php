
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Resource Creator Form</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
<!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?><!-- ">-->

</head>

<body>

<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>
    <?php include_once "components/navbars/rc_nav_2.php"?>
    <div class="content-area">
        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <h1>Connect Resource to Topic</h1>
            </div>
            <div class="top-bar-btns">
                <a onclick="history.back()">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php"?>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / Resource to Topic</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="rc-upload-box" >
                    <form method="POST" id="rc-form" >
                        <div class="rc-upload-home-title">
                            <h1 style="padding:5px 0;">Add Resource To Topic No: <?php echo $data[0]->id ?></h1>
                            <label >
                                <label class="" style="padding:3px 20px;background:gray;color:white;border-radius:5px;">Name : <?php echo $data[0]->name ?></label>
                            </label>
                        </div>

                        <div class="rc-form-group" style="flex: 1;">
                            <label> Chooose Resource Type : </label>
                            <label>
                                <select class="pp-quiz-chooser" id="typeChooser">
                                    <option value="0" default>Select Type</option>
                                    <option value="1">Video</option>
                                    <option value="2">PDF</option>
                                    <option value="3">Past Paper</option>
                                    <option value="4">Quiz</option>
                                    <option value="5">Other</option>
                                </select>
                            </label>
                        </div>


                        <div class="rc-form-group" id="resourceChooserContainer" style="display:none;flex: 1;">
                            <hr class="rc-form-hr"/>
                            <label> Chooose Resource : </label>
                            <label>
                                <select class="pp-quiz-chooser"  name="resource" id="resourceChooser">
                                </select>
                                </label>
                        </div>

                        <div class="rc-topic-rsrc-info" id="resourceInfoContainer" style="display:none;">
                            <hr class="rc-form-hr"/>
                            <div class="rc-upload-home-title">
                                Resource Info
                            </div>
                            <div class="rc-form-group">
                                    <label> Resource ID :
                                        <label class="" id="resID"></label>
                                    </label>
                                    <label> Resource Name :
                                        <label class="" id="resName"></label>
                                    </label>
                            </div>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" id="addBtn" style="margin:10px auto;width: 100%;">
                                Add Resource
                            </button>
                        </div>
                    </form>
            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const gradeID = <?php echo $_SESSION['gid'] ?>;
    const subjectID = <?php echo $_SESSION['sid'] ?>;
    let resourcesByType = <?php echo json_encode($data[2]) ?>;
    const topicID = <?php echo $data[0]->id ?>;

</script>
<script src="<?php echo BASEURL . '/public/javascripts/addResourceOrganized.js' ?>"></script>

</html>