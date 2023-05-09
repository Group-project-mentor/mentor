<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>New Question</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<?php
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        $message = "Operation Successful !";
        include_once "components/alerts/operationSuccess.php";
    } elseif ($_SESSION['message'] == "failed") {
        $message = "Operation Failed !";
        include_once "components/alerts/operationFailed.php";
    } elseif($_SESSION['message'] == 'max_answers'){
        $message = "Max answers reached !";
        include_once "components/alerts/operationFailed.php";
    }
}
?>

<section class="page">

    <!-- Navigation panel -->
    <?php include_once "quiz_alerts/answerDelConf.php"?>

    <?php include_once "components/navbars/rc_nav_2.php"?>


    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL."quiz/questions/".$data[0]?>">
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

            <!-- Title and subtitle of middle part -->
            <div class="mid-title">
                <h1>C79 - Science</h1>
                <h6>My Subjects / Science-6 / Quizzes / <?php echo $data[0]?> / QID <?php echo $data[2][0]?></h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>TEST 1 </h1>
                    <div class="rc-quiz-top-btns">
                        <a href="<?php echo BASEURL."quiz/editQuestion/".$data[0]."/".$data[1] ?>" class="rc-add-btn" id="quiz-save-btn">
                            Edit Question
                        </a>
                    </div>
                </div>

                <div  class="quiz-container" >

                    <div class="rc-form-group">
                        <label for="quizName" class="rc-form-label">
                            Question :
                        </label>
                        <div class="quiz-question-preview">
                            <?php echo $data[2][2] ?>
                        </div>
                    </div>

                    <?php if(!empty($data[2][4])){ ?>
                    <div class="rc-form-group">
                        <label for="quizName" class="rc-form-label">
                            Image :
                        </label>
                        <img src="<?php echo BASEURL."public_resources/quizzes/questions/".$_SESSION['gid'].'/'.$_SESSION['sid'].'/'.$data[2][4] ?>" alt="question-image" class="quiz-question-image-preview">
                    </div>
                    <?php }?>
                    <hr class="quiz-line" />

                    <a style="display: flex;justify-content: center;text-decoration: none;" href="<?php echo BASEURL.'quiz/answer/'.$data[0].'/'.$data[1] ?>">
                        <button type="button" class="rc-quiz-button green" id="addAnsBtn" >
                            + Add Answer
                        </button>
                    </a>
                    <?php if(!empty($data[4])){
                    $count = 0;
                    ?>
                    <div>
                        <label for="">Correct Answer : </label>
                        <select id="correctChooser" style="padding:5px 10px;margin: 10px;">
                            <?php foreach($data[4] as $row){
                            $count++;
                            ?>
                            <option value="<?php echo $row[0] ?>" <?php echo ($row[3])?"selected":"" ?>>
                                <?php echo $count ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php } ?>

                    <?php if(!empty($data[4])){
                        $count = 0;
                    ?>
                    <div id="quiz-box">
                        <?php foreach($data[4] as $row){
                            $count++;
                        ?>
                        <div class="quiz-box-answer">
                            <div class="quiz-box-number">
                                <h3><?php echo $count ?></h3>
                                <img src="<?php echo BASEURL.'assets/icons/'.($row[3]==1?'icon_correct.png':'icon_incorrect.png') ?>" alt="<?php echo $row[3]==1?'Corrct':'Wrong' ?>"/>
                            </div>
                            <div class="quiz-box-description">
                                <p>
                                    <?php echo $row[2]?>
                                </p>
                                <?php if(!empty($row[4])){ ?>
                                <img src='<?php echo BASEURL."public_resources/quizzes/answers/".$_SESSION['gid'].'/'.$_SESSION['sid'].'/'.$row[4]?>' alt="fgdfg"/>
                                <?php }?>
                            </div>
                            <a class="quiz-box-edit" onclick="delConfirm(<?php echo $data[0] ?>,<?php echo $data[1] ?>,2,<?php echo $row[0] ?>)">
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a class="quiz-box-edit" href="<?php echo BASEURL.'quiz/editAnswer/'.$data[0].'/'.$data[1].'/'.$row[0]?>">
                                <img src="<?php echo BASEURL.'assets/icons/icon_edit.png'?>" alt="">
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php }else {?>
                        <h3 class="quiz-container-nothing">No Answers <br> Click "Add Answer" to add answers</h3>
                    <?php } ?>
                </div>
            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL?>';
    const quizID = <?php echo $data[2][0] ?>;
    const answerAvil = <?php echo !empty($data[4])?1:0 ?>;


    if (answerAvil){
        let correctChooser = document.getElementById('correctChooser');

        correctChooser.onchange = (event) => {
            let ansID = event.target.value;
            fetch(`${BASEURL}quiz/markCorrectness/${quizID}/${ansID}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status.trim() === "success"){
                        console.log(data);
                        location.reload();
                    }else {
                        console.log(data);
                    }
                })
                .catch(err => console.log(err));
        }
    }



</script>
<script src="<?php echo BASEURL . 'javascripts/quizDeleteConfirm.js' ?>"></script>
</html>