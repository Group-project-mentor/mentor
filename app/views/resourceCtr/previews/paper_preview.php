
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Update Pastpaper</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<style>
    .form-sub-info{
        color: green;
        padding:3px 10px;
        background-color:#ddd;
        border-radius:5px;
        margin: 5px 10px;
    }
    .rc-form-group label{
        margin: 10px 0px;
    }
</style>

<body>
<?php
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        $message = "Resource Updated Successfully !";
        include_once "components/alerts/operationSuccess.php";
        $message = "Resource Update Failed !";
    } elseif ($_SESSION['message'] == "failed") {
        include_once "components/alerts/operationFailed.php";
    } elseif ($_SESSION['message'] == "unlinked"){
        include_once "components/alerts/pastpaperUnlinked.php";
    }
}
?>
<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php" ?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / document / edit </h6>
                </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'rcResources/pastpapers/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">
            <div class="resource-tab-main">
                <div class="resource-tab-pane">
                    <div class="tp-tab active">
                         Info
                    </div>
                    <div class="tp-tab active">
                         Paper
                    </div>
                    <div class="tp-tab active">
                        Answers
                    </div>
                </div>
            </div>
            <hr style="border: 1px solid rgba(128,128,128,0.06);width: 50%;margin: auto;"/>


<!-- ? This is the upload file changing section of past paper-->
            <section class="tab-container" style="display: flex;justify-content: center;">
                <?php
                if(empty($data[0])){
                    echo
                    '<div style="text-align: center;font-size: x-large;color: darkred;">
                        <br>
                        You are not authorized to do this action !
                    </div>';
                }
                else{
                    ?>
                    <div class="rc-upload-box">
                            <div class="rc-upload-home-title" style="width:250px;">
                                Edit Past Paper
                            </div>
                            <div class="rc-form-group">
                                <label>Name : 
                                    <span class="form-sub-info" ><?php echo $data[1]->name ?></span>
                                </label>
                                <label>Part : 
                                    <span class="form-sub-info" ><?php echo $data[1]->part ?></span>
                                </label>
                                <label>Year : 
                                    <span class="form-sub-info" ><?php echo $data[1]->year ?></span>
                                </label>
                                <label>Linked Quiz :  
                                    <span class="form-sub-info" >
                                        <?php if(empty($data[1]->qid)){?>
                                            No Quiz
                                        <?php }else{?>
                                            <a href="<?php echo BASEURL."quizPreview/instructions/".$data[1]->qid ?>"> Go to quiz </a>
                                        <?php } ?>
                                    </span>
                                </label>
                            </div>
                        </div>
                <?php }?>
            </section>

            <section class="tab-container" style="display: flex;justify-content: center;">
                <?php
                if(empty($data[1]->location)){
                    echo
                    '<div style="text-align: center;font-size: x-large;color: darkred;">
                        <br>
                        You are not authorized to do this action !
                    </div>';
                }
                else{
                    ?>
                    <div class="container-box" style="width:100%;">
                        <embed src="<?php echo BASEURL?>public_resources/pastpapers/<?php echo $_SESSION['gid']."/".$_SESSION['sid']."/".$data[1]->location ?>" style="width:50%;height:70vh;margin:auto;">
                    </div>
                <?php }?>
            </section>

            <section class="tab-container" style="display: flex;justify-content: center;">
                <?php
                if(empty($data[1]->answer)){
                    echo
                    '<div style="text-align: center;font-size: x-large;color: darkred;">
                        <br>
                        You are not authorized to do this action !
                    </div>';
                }
                else{
                    ?>
                    <div class="container-box" style="width:100%;height:max-content;">
                        <embed src="<?php echo BASEURL?>public_resources/answers/<?php echo $_SESSION['gid']."/".$_SESSION['sid']."/".$data[1]->answer ?>" style="width:50%;height:70vh;margin:auto;">
                    </div>
                <?php }?>
            </section>

    </div>
    <div class="warning-pop-up">

    </div>
</section>
</body>

<script>
    const BASEURL = "<?php echo BASEURL ?>";
    // const paperId = <?php // echo $data[0]->id ?>;
    // let quizId = <?php // echo (isset($data[0]->qid))?$data[0]->qid:0 ?> ;
</script>
<script src="<?php echo BASEURL.'javascripts/rc_viewPastpaper.js' ?>"></script>

</html>