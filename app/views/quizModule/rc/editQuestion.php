<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Edit Question</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
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
                <a href="<?php echo BASEURL."quiz/addAnswers/".$data[0]."/".$data[1]?>">
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
                <h6>My Subjects / Science-6 / Quiz / Create</h6>
            </div>

            <!-- Grade choosing interface -->
            <form class="container-box" method="POST" action="<?php echo BASEURL."quiz/editQuestionAction/".$data[0]."/".$data[1]?>" enctype="multipart/form-data">
                <div class="rc-resource-header">
                    <h1>TEST 1</h1>
                    <div class="rc-quiz-top-btns">
                        <button type="submit" name="submit" class="rc-add-btn" id="quiz-save-btn">
                            Update
                        </button>
                    </div>
                </div>

                <div  class="quiz-container" >

                    <div class="rc-form-group">
                        <label for="quizName" class="rc-form-label">
                            Question :
                        </label>
                        <textarea placeholder="Enter your question" name="question" id="questionTxt" rows="7"><?php echo $data[2][2] ?></textarea>

                    </div>

                    <div class="rc-form-group">
                        <div id="image_preview" style="<?php echo empty($data[2][4])?"display:none;":"" ?>">
                            <small style="margin-left:20px;">Image : </small>
                            <img
                                    id="image_tag"
                                    src="<?php echo BASEURL."public_resources/quizzes/answers/".$_SESSION['gid']."/".$_SESSION['sid']."/".$data[2][4] ?>"
                                    alt=""
                                    style="width:100%;">
                        </div>
                        <input type="file" name="questionImage" class="rc-quiz-image-input" id="questionImg" accept="image/png, image/jpeg, image/jpg">
                    </div>

                </div>
            </form>
    </div>
</section>
</body>

<script>
    let fileChooser = document.getElementById("questionImg");

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