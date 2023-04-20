<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Add Pastpaper</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
<?php
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/resource_edited.php";
        } elseif ($_SESSION['message'] == "failed") {
            include_once "components/alerts/res_update_failed.php";
        } elseif ($_SESSION['message'] == "unlinked"){
            include_once "components/alerts/pastpaperUnlinked.php";
        }
    }
?>
<section class="page">

    <!-- Navigation panel -->
    <?php include_once "components/navbars/t_navbar_3.php" ?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="-icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'TResources/pastpapers/'.$_SESSION["cid"] ?>">
                    <div class="back-btn">Back</div>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'rcProfile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1><?php echo "Grade ".ucfirst($_SESSION['cid']) ?></h1>
                <h6>My Subjects / <?php echo ucfirst($_SESSION['cid']) ?> / document / add </h6>
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
                </div>
            </div>
            <hr style="border: 1px solid rgba(128,128,128,0.06);width: 50%;margin: auto;"/>


            <!-- ? This is the upload file changing section of past paper-->
            <section class="tab-container" style="display: flex;justify-content: center;">
                    <div class="rc-upload-box">
                        <form action="<?php echo BASEURL.'TAdd/addPastPaper/'?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                            <div class="rc-upload-home-title">
                                Edit Past Paper
                            </div>
                            <div class="rc-form-group">
                                <label>Name </label>
                                <input type="text" name="name" placeholder="enter name"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Year </label>
                                <input type="text" name="year" placeholder="enter year"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Part </label>
                                <input type="text" name="part" value="" placeholder="enter the section"/>
                            </div>
                            <div class="rc-form-group">
                                <label>
                                    Link a quiz :
                                    <select class="pp-quiz-chooser" id="quizChooser" name="question">
                                        <option value="0">No quiz selected</option>
                                    </select>
                                </label>
                            </div>
                            <div class="rc-form-group">
                                <label>Paper</label>
                                <div>
                                    <input id="inputBtn" type="file" name="resource">
                                    <h3>Choose document</h3>
                                </div>
                                <p id="fileName" style="text-align:right;"></p>
                                <h5 id="fileSize" style="text-align:right;"></h5>
                            </div>
                            <div class="rc-upload-button">
                                <button type="submit" name="submit">Update</button>
                            </div>

                        </form>
                    </div>
            </section>

            <section class="tab-container" style="display: flex;justify-content: center;">
            </section>


    </div>
    <div class="warning-pop-up">

    </div>
</section>
</body>
<script src="<?php echo BASEURL.'public/javascripts/middleFunctions.js' ?>"></script>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
    const paperId = 0 ;
    //const paperId = <?php //echo $data[0]->id ?>//;
    let quizId = 0 ;
    //let quizId = <?php //echo (isset($data[0]->qid))?$data[0]->qid:0 ?>// ;


    let inputBtn = document.getElementById('inputBtn');
    let tab = document.getElementsByClassName('tp-tab');
    let tabCont = document.getElementsByClassName('tab-container');

    document.getElementById('fileName').textContent = (document.getElementById('fileName').textContent) ? refactorFileName(document.getElementById('fileName').textContent) : 'no files selected';
    document.getElementById('fileSize').textContent = (document.getElementById('fileName').textContent) ? converter(document.getElementById('fileName').textContent) : ' ';

    inputBtn.addEventListener('change',()=>{
        document.getElementById('fileName').textContent = (inputBtn.files[0].name) ? refactorFileName(inputBtn.files[0].name) : 'no files selected';
        document.getElementById('fileSize').textContent = (inputBtn.files[0].size) ? converter(inputBtn.files[0].size) : ' ';
    });

    // ? Tab - containers handler
    for (let j = 1; j < tabCont.length; j++) {
        tabCont[j].style.display = 'none';
        tab[j].classList.remove('active');
    }

    for (let i = 0; i < tab.length; i++){
        tab[i].onclick = () => {
            for (let j = 0; j < tabCont.length; j++) {
                if (i!==j) {
                    tabCont[j].style.display = 'none';
                    tab[j].classList.remove('active');
                }
            }
            tabCont[i].style.display = 'flex';
            tab[i].classList.add('active');
        }
    }

    // ? display the quiz data in linked part
    const getQuizData = (qid) => {
        let labels = document.getElementsByClassName('special-label');
        fetch(`${BASEURL}rcEdit/getSpecificQuizInfo/${qid}`)
            .then(response => response.json())
            .then(data => {
                labels[0].textContent = 'Quiz id: ' + data.id;
                labels[1].textContent = 'Name : ' + data.name;
                labels[2].textContent = 'Marks : ' + data.marks;
                quizId = data.id;
            })
            .catch(err => console.log(err));
    }

    quizId && getQuizData(quizId);

    fetch(`${BASEURL}rcEdit/getQuizListInfo`)
        .then(response => response.json())
        .then(data => {
            data.forEach(row => {
                document.getElementById('quizChooser').innerHTML +=
                    `<option value="${row[0]}">${row[0]} - ${row[1]}</option>`;
            });
        })
        .catch(err => console.log(err));


</script>

</html>