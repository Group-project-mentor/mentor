<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/quiz/quiz_styles.css">
</head>

<body>
<?php include_once "quiz_alerts/questionDelConf.php"?>

<?php if($data[3]=="delErr"){
    include_once "quiz_alerts/questionDelConf.php";
}?>
<section class="page">
    <!-- Navigation panel -->
    <nav class="nav-bar" id="nav-bar">

        <!-- Navigation bar logos -->
        <div class="nav-upper">
            <div class="nav-logo-short">
                <img src="<?php echo BASEURL?>public/assets/logo2.png" alt="logo" />
            </div>
            <div class="nav-logo-long" id="nav-logo-long">
                <img src="<?php echo BASEURL?>public/assets/logo1.png" alt="logo" />
            </div>
        </div>


        <!-- Navigation bar private - public switch -->
        <div class="nav-middle" id="nav-middle">
            <p>Public</p>
            <div class="nav-switch">
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider round"></span>
                </label>
            </div>
            <p class="nav-switch-txt">Private</p>
        </div>


        <!-- Navigation buttons -->
        <div class="nav-links">
            <a href="#" class="nav-link">
                <img class="active" src="<?php echo BASEURL?>public/assets/icons/icon_video.png" alt="home">
                <div class="nav-link-text">Video</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_quizzes.png" alt="cource">
                <div class="nav-link-text">Quizzes</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_past_papers.png" alt="profile">
                <div class="nav-link-text">Past papers</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_pdf.png" alt="report">
                <div class="nav-link-text">PDF</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_other.png" alt="bmc">
                <div class="nav-link-text">Other resource</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_settings.png" alt="report">
                <div class="nav-link-text">Settings</div>
            </a>
            <a href="#" class="nav-link">
                <img src="<?php echo BASEURL?>public/assets/icons/icon_report.png" alt="bmc">
                <div class="nav-link-text">Report issue</div>
            </a>
        </div>

        <!-- Navigation bar toggler -->
        <div class="nav-toggler" id="nav-toggler">
            <img src="<?php echo BASEURL?>public/assets/icons/toggler.png" alt="toggler">
        </div>
    </nav>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="#">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>C79 - Science</h1>
                <h6>My Subjects / Science-6 / Quizzes / <?php echo $data[1][0]." - ".$data[1][1]?> </h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1><?php echo ucfirst($data[1][1]) ?></h1>
                    <div class="rc-quiz-top-btns">

                        <a href="">
                            <div class="rc-add-btn">
                                Preview
                            </div>
                            <a href="<?php echo BASEURL."quiz/addQuestion/".$data[1][0] ?>">
                                <div class="rc-add-btn">
                                    + Add Question
                                </div>
                            </a>
                    </div>
                </div>

                <div style="display:inline;margin: auto;">
                    <div class="quiz-mark-box">Marks : <?php echo $data[1][3] ?> </div>
<!--                    <div class="quiz-mark-box">Questions : --><?php //echo empty($data[1][2]) ? 0 : $data[1][2] ?><!-- </div>-->
                    <div class="quiz-mark-box">Questions : <?php echo $data[2] ?> </div>
                </div>

                <?php if(!empty($data[0])){ $count = 0; ?>
                <div class="rc-resource-table">
                    <div class="rc-table-title">
                        <div class="rc-resource-col">Question</div>
                        <div></div>
                    </div>

                    <?php foreach($data[0] as $row){?>
                    <div class="rc-pdf-row">
                        <div class="rc-resource-col" style="text-overflow:ellipsis;">
                            <?php  echo strlen($row['description'])>50?(++$count.")  ".substr($row['description'],0,50)."...")
                                                                                : ++$count.")  ".$row['description'];
                            ?>  </div>
                        <div class="rc-quiz-row-btns">
                            <a onclick="delConfirm(<?php echo $data[4]?>, <?php echo $row['number']?>, 1)">
                                <img src="<?php echo BASEURL?>public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a href="<?php echo BASEURL.'quiz/addAnswers/'.$data[4].'/'.$row['number'] ?>">
                                <img src="<?php echo BASEURL?>public/assets/icons/icon_edit.png" alt="edit">
                            </a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <?php }else{ ?>
                        <br><br>
                    <h2 style="text-align: center;color: gray;">
                        No Questions...
                    </h2>
                    <h4 style="text-align: center;color: gray;">
                        Click add question to make questions
                    </h4>
                <?php }?>
            </div>
    </div>
</section>
</body>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        }

        else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })
</script>
<script src="<?php echo BASEURL.'javascripts/quizDeleteConfirm.js' ?>"></script>

</html>