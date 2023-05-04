
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
            <div class="search-bar">
                
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

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".$_SESSION['gname']." - ".ucfirst($_SESSION['sname']) ?></h1>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / document / edit </h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
<!--                <div class="rc-resource-header">-->
<!--                    <h1>EDIT PAPER</h1>-->
<!--                </div>-->
            </div>

            <div class="resource-tab-main">
                <div class="resource-tab-pane">
                    <div class="tp-tab active">
                         Paper
                    </div>
                    <div class="tp-tab active">
                        Answers
                    </div>
                    <div class="tp-tab">
                        Quiz
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
                        <form action="<?php echo BASEURL.'rcEdit/editPastpaper/'.$data[0]->id ?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                            <div class="rc-upload-home-title">
                                Edit Past Paper
                            </div>
                            <div class="rc-form-group">
                                <label>Name </label>
                                <input type="text" name="title" value="<?php echo $data[0]->name ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Year </label>
                                <input type="text" name="year" value="<?php echo $data[0]->year ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Part </label>
                                <input type="text" name="part" value="<?php echo $data[0]->part ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Paper</label>
                                <div>
                                    <input id="inputBtn" type="file" name="paper">
                                    <h3>Choose document</h3>
                                </div>
                                <p id="fileName" style="text-align:right;"><?php echo $data[0]->location ?></p>
                                <h5 id="fileSize" style="text-align:right;"></h5>
                            </div>
                            <div class="rc-upload-button" >
                                <button type="submit" name="submit">Update</button>
                            </div>

                        </form>
                    </div>
                <?php }?>
            </section>

            <section class="tab-container" style="display: flex;justify-content: center;">
                <?php
                if(empty($data[0]->answer)){
                    echo
                    '<div style="text-align: center;font-size: x-large;color: darkred;">
                        <br>
                        You are not authorized to do this action !
                    </div>';
                }
                else{
                    ?>
                    <div class="rc-upload-box">
                        <form action="<?php echo BASEURL.'rcEdit/editPastpaperAnswer/'.$data[0]->id ?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                            <div class="rc-form-group">
                                <label>Answers PDF</label>
                                <div>
                                    <input id="answerInput" type="file" name="answer">
                                    <h3>Choose document*</h3>
                                </div>
                                <p id="fileNameA" style="text-align:right;"><?php echo $data[0]->answer ?></p>
                                <h5 id="fileSizeA" style="text-align:right;"></h5>
                            </div>
                            <div class="rc-upload-button" >
                                <button type="submit" name="submit">Update</button>
                            </div>

                        </form>
                    </div>
                <?php }?>
            </section>
<!-- ? This is the linked quiz changing section of past paper-->
            <section class="tab-container" style="display: flex;justify-content: center;">

                    <div style='color:gray;font-size:larger;text-align: center;margin-top: 20px;<?php echo (empty($data[0]->qid))?  "display:block;": "display:none;"?>'>
                        No Quiz Linked to this Paper
                        <div class="rc-upload-button rc-button-vertical" style="margin-top: 20px;">
                            <button type="button" id="newQuizLink">Link A Quiz</button>
<!--                            <button type="button" class="createQuiz">Go to Quizzes</button>-->
                        </div>
                        <form id="quiz-change-form-2"
                              action="<?php echo BASEURL.'rcEdit/changePPQuiz/'.$data[0]->id ?>"
                              method="POST"
                              enctype="multipart/form-data"
                              class="rc-upload-form"
                              style="border: 1px solid rgba(128,128,128,0.28);padding: 10px;border-radius: 10px;display: none;"
                        >

                            <div class="rc-form-group">
                                <label>
                                    <select class="pp-quiz-chooser" id="quizChooser2" name="quiz_id"></select>
                                </label>
                                <button id="linkingBtn" type="submit" class="pp-vertical-btn" style="width: 100%;">Link the quiz</button>
                                <button  type="button" id="quizChangeCloseBtn2"  class="pp-vertical-btn" style="width: 100%;background:rgba(144,11,11,0.09);color: darkred;">
                                    Cancel
                                </button>
                            </div>
                            <small> <u>NOTE</u> : If you want to link a new quiz.<br> <b>Go to Quizzes</b> and make a new one.<br> After that you can select it from this list</small>
                        </form>
                    </div>

                <div class="rc-upload-box" style='<?php echo (!empty($data[0]->qid))?  "display:block;": "display:none;"?>'>
                        <div class="rc-form-group">
                            <label class="special-label">Quiz Id : <?php echo $data[0]->qid ?></label>
                            <label class="special-label">Name : Hello</label>
                            <label class="special-label">Marks : 100</label>
<!--                            <a href="--><?php //echo BASEURL.'rcResources/quizzes/' ?><!--" class="pp-vertical-btn createQuiz">Go to Quizzes</a>-->
                            <button class="pp-vertical-btn" id="quizChangeBtn">Change Linked Quiz</button>
                            <a class="pp-vertical-btn" id="quizEditBtn" href="<?php echo BASEURL.'quiz/questions/'.$data[0]->qid ?>">Edit Quiz</a>
                            <a class="pp-vertical-btn" id="quizUnlinkBtn" style="background:rgba(144,11,11,0.09);color: darkred;" href="<?php echo BASEURL.'rcEdit/pastPaperUnlinkQuiz/'.$data[0]->id ?>">
                                Unlink Quiz
                            </a>
<!--                            <input type="text" name="title" value="--><?php //echo $data[0]->qid ?><!--"/>-->
                        </div>
                    <form id="quiz-change-form"
                          action="<?php echo BASEURL.'rcEdit/changePPQuiz/'.$data[0]->id ?>"
                          method="POST"
                          enctype="multipart/form-data"
                          class="rc-upload-form"
                          style="border: 1px solid rgba(128,128,128,0.28);padding: 10px;border-radius: 10px;display: none;"
                    >
                        <div class="rc-form-group">
                            <label>
                                <select class="pp-quiz-chooser" id="quizChooser" name="quiz_id"></select>
                            </label>
                            <button id="linkingBtn" type="submit" class="pp-vertical-btn" style="width: 100%;">Link the quiz</button>
                            <button  type="button" id="quizChangeCloseBtn"  class="pp-vertical-btn" style="width: 100%;background:rgba(144,11,11,0.09);color: darkred;">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </section>

    </div>
    <div class="warning-pop-up">

    </div>
</section>
</body>

<script>
    const BASEURL = "<?php echo BASEURL ?>";
    const paperId = <?php echo $data[0]->id ?>;
    let quizId = <?php echo (isset($data[0]->qid))?$data[0]->qid:0 ?> ;
</script>
<script src="<?php echo BASEURL.'javascripts/rc_editPastpaper.js' ?>"></script>

</html>