<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Questions</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/quiz/quiz_styles.css">

    <style>
        .quiz-result {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f8f8f8;
        }

        .quiz-result h2 {
            margin-top: 0;
        }

        .quiz-result img {
            width: 50px;
            margin: 10px;
        }

        .quiz-result h3 {
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?>


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'st_public_resources/index_quizzes/' . $_SESSION['gid'] . '/' . $_SESSION['sid'] ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="quiz-preview-content">
                <div>
                    <h2>Grade <?php echo $_SESSION['gid'] + 5 ?> - <?php echo $_SESSION['sname'] ?></h2>
                    <h2><?php echo $_SESSION['name'] ?></h2>
                    <br><br><br>
                    <div class="quiz-result">
                        <h2>You Done This Quiz !</h2>
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_correct.png" alt="">
                        <?php 
                        $total = ($data[0]->score / $data[0]->current_q) * 100 ?>
                        <h3>Marks : <?php echo $total ?> %</h3>
                        <h3>Total No Of Questions in the Quiz: <?php echo $data[0]->current_q ?></h3><br>
                        <h3>Total No of Correct Questions :<?php echo $data[0]->score ?> Out Of <?php echo $data[0]->current_q ?></h3>
                        
                    </div>

                </div>

            </section>



        </div>
    </section>
</body>

</html>