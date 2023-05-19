<?php
if (!isset($_SESSION['user'])) {
    header("location:" . BASEURL . "login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC-Subjects</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_card_set.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div style="display: flex;align-items: center;">
                    <a href="<?php echo BASEURL . 'home' ?>" style="text-decoration:none;">
                        <div class="back-btn">Back</div>
                    </a>

                </div>

                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
                <div class="subject-heading-divider">
                    <!-- Title and sub title of middle part -->
                    <div class="mid-title">
                        <h1>My Subjects</h1>
                        <h6><?php echo $_SESSION["name"] ?></h6>
                    </div>
                    <div class="subject-heading-container">
                        <div style="margin: 0 5px;">
                            <label>
                                <select class="grade-chooser" id="gradeChooser" name="question">
                                    <option value="0">All Grades</option>
                                    <?php
                                    if(!empty($data[1])){
                                    foreach ($data[1] as $row){ ?>
                                        <option value="<?php echo $row->id ?>">Grade <?php echo $row->name ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </label>
                        </div>
                        <div style="margin: 0 5px;">
                            <label>
                                <select class="grade-chooser" id="subjectChooser" name="question">
                                    <option value="0">All Subjects</option>
                                    <?php
                                    if(!empty($data[2])){
                                        foreach ($data[2] as $row){ ?>
                                            <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- subject cards -->
                <div class="container-box">
                    <div class="subject-card-set" id="subCardSet">

                        <?php
                        if (!empty($data[0])) {
                            $count = 1;
                            foreach ($data[0] as $row) {
                        ?>
                                <div class='subject-card'>
                                    <div class="subject-card-inside">
                                        <img src='<?php echo BASEURL ?>assets/patterns/<?php echo $count ?>.png' alt='' />
                                    </div>
                                    <div class="subject-card-titles">
                                        <label class="subject-card-texts"><?php echo ucfirst($row->sname) ?> </label>
                                        <label class="subject-card-texts">Grade <?php echo $row->gname ?> </label>
                                    </div>

                                    <a href='<?php echo BASEURL . "rcResources/organized/" . $row->gid . "/" . $row->sid ?>'>
                                        <label>Enter</label>
                                        <img src='<?php echo BASEURL ?>assets/icons/icon-enter.png' alt='' />
                                    </a>
                                </div>
                        <?php $count++;
                                if ($count > 12) $count = 1;
                            }
                        }
                        ?>
                    </div>
                </div>

        </div>

    </section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL?>';
    let gradeChooser = document.getElementById("gradeChooser");
    let subjectChooser = document.getElementById("subjectChooser");
    let subCardSet = document.getElementById("subCardSet");

    let grade = 0;
    let subject = 0;

    const renderCards = () => {
        subCardSet.innerHTML = "";
        fetch(`${BASEURL}rcSubjects/filterByGradeSubject/${grade}/${subject}`)
            .then(response => response.json())
            .then(data => {
                if(data.length !== 0){
                    let count = 1;
                    data.forEach(item => {
                        subCardSet.innerHTML += `
                        <div class="subject-card">
                            <div class="subject-card-inside">
                                <img src="${BASEURL}assets/patterns/${count++}.png" alt="" />
                            </div>
                            <div class="subject-card-titles">
                                <label class="subject-card-texts">${item.sname}</label>
                                <label class="subject-card-texts">Grade ${item.gname}</label>
                            </div>
                            <a href='${BASEURL}rcResources/videos/${item.gid}/${item.sid}'>
                                <label>Enter</label>
                                <img src='<?php echo BASEURL ?>assets/icons/icon-enter.png' alt='' />
                            </a>
                        </div>
                    `
                    })
                }else{
                    subCardSet.innerHTML = '<div style="margin: 10px;font-size: large;">No Results</div>';
                }
            })
            .catch(err => console.log(err));
    }

    gradeChooser.onchange = event => {
        grade = event.target.value;
        renderCards();
    }

    subjectChooser.onchange = event => {
        subject = event.target.value;
        renderCards();
    }

</script>
</html>