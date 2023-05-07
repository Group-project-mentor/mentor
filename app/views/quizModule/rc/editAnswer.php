<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Edit Answer</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL . 'quiz/addAnswers/' . $data[0] . '/' . $data[2] ?>">
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
                <h1>C79 - Science</h1>
                <h6>My Subjects / Science-6 / Quizzes / <?php echo $data[0] ?> / question <?php echo $data[1][4] ?> / edit answer</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>TEST 1</h1>
                    <div class="rc-quiz-top-btns">
                        <a class="rc-add-btn" id="quiz-save-btn">
                            Edit Question
                        </a>
                    </div>
                </div>

                <div  style="margin-top:30px;" class="quiz-answer-main quiz-ans-popup" id="ansBox">
                    <form class="quiz-answer-set" action="<?php echo BASEURL . 'quiz/editAnswerAction/' . $data[0] . '/' . $data[2] . '/' . $data[1][0] ?>" method="POST" enctype="multipart/form-data">
                        <div class="rc-form-group">
                            <div class="answer-option-set">
                                <h2>Answer</h2>
                            </div>
                            <div class="answer-correctness-btn">
                                <input type="checkbox" name="correct" id="quiz-answer-radio" value="correct" <?php echo ($data[1][3] == 1) ? "checked" : "" ?> />
                                <label for="quiz-answer-radio">Correct</label>
                            </div>
                            <textarea placeholder="Enter your Answer" name="answer" id="ansTxt" rows="4"><?php echo $data[1][2] ?></textarea>
                            <div id="image_preview" style="<?php echo empty($data[1][5])?"display:none;":"" ?>">
                                <small style="margin-left:20px;">Image : </small>
                                <img 
                                id="image_tag"
                                src="<?php echo BASEURL."public_resources/quizzes/answers/".$_SESSION['gid']."/".$_SESSION['sid']."/".$data[1][5] ?>" 
                                alt="" 
                                style="width:100%;">
                            </div>
                            <input type="file" accept="image/png, image/jpeg, image/jpg" class="rc-ans-image-input" id="ansImage" name="ansImg" value="<?php echo $data[2][4] ?>"/>
                        </div>
                        <div style="display: flex;justify-content: center;">
                            <button type="submit" class="rc-quiz-button green" id="addAnsBtn">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
    </div>
</section>
</body>
<script>

    let fileChooser = document.getElementById("ansImage");

    let image = "";

    fileChooser.addEventListener("change", () => {
        f = fileChooser.files[0];
        if (f) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(f);
            fileReader.addEventListener("load", () => {
                image = fileReader.result;
                document.getElementById("image_preview").style.display = "flex";
                document.getElementById("image_tag").src = image;
            });
        }else{
            document.getElementById("image_preview").style.display = "none";
        }
    });
</script>


</html>