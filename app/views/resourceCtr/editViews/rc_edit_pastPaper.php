
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Edit Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
<?php
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        include_once "components/alerts/res_update_success.php";
    } elseif ($_SESSION['message'] == "failed") {
        include_once "components/alerts/res_update_failed.php";
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
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="-icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'rcResources/pastpapers/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
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
                    echo "<p style='color:red;font-size:x-large;text-align: center;'>You are not authorized to do this action !</p>";
                }
                else{
                    ?>
                    <div class="rc-upload-box">
                        <form action="<?php echo BASEURL.'rcEdit/editDocument/'.$data[0]->id ?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                            <div class="rc-upload-home-title">
                                Edit Past Paper
                            </div>
                            <div class="rc-form-group">
                                <label>Name </label>
                                <input type="text" name="title" value="<?php echo $data[0]->name ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Year </label>
                                <input type="text" name="title" value="<?php echo $data[0]->year ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Part </label>
                                <input type="text" name="title" value="<?php echo $data[0]->part ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label>Paper</label>
                                <div>
                                    <input id="inputBtn" type="file" name="resource">
                                    <h3>Choose document</h3>
                                </div>
                                <p id="fileName" style="text-align:right;"><?php echo $data[0]->location ?></p>
                                <h5 id="fileSize" style="text-align:right;"></h5>
                            </div>
                            <div class="rc-upload-button">
                                <button type="submit" name="submit">Update</button>
                            </div>

                        </form>
                    </div>
                <?php }?>
            </section>

            <section class="tab-container" style="display: flex;justify-content: center;">
            </section>
<!-- ? This is the linked quiz changing section of past paper-->
            <section class="tab-container" style="display: flex;justify-content: center;">

                    <div style='color:gray;font-size:larger;text-align: center;margin-top: 20px;<?php echo (empty($data[0]->qid))?  "display:block;": "display:none;"?>'>
                        No Quiz Linked to this Paper
                        <div class="rc-upload-button rc-button-vertical" style="margin-top: 20px;">
                            <button type="button" id="newQuizLink">Link A Quiz</button>
                            <button type="button" >Create A Quiz</button>
                        </div>
                    </div>

                <div class="rc-upload-box" style='<?php echo (!empty($data[0]->qid))?  "display:block;": "display:none;"?>'>
                        <div class="rc-form-group">
                            <label class="special-label">Quiz Id : <?php echo $data[0]->qid ?></label>
                            <label class="special-label">Name : Hello</label>
                            <label class="special-label">Marks : 100</label>
                            <button class="pp-vertical-btn" id="quizChangeBtn">Change Linked Quiz</button>
                            <button class="pp-vertical-btn" id="quizEditBtn" >Edit Quiz</button>
                            <button class="pp-vertical-btn" id="quizUnlinkBtn" style="background:rgba(144,11,11,0.09);color: darkred;">
                                Unlink Quiz
                            </button>
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

</section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
    const paperId = <?php echo $data[0]->id ?>;
    let quizId = <?php echo (isset($data[0]->qid))?$data[0]->qid:0 ?> ;

    const converter = (val) => {
        if(val < 1000)
            return Math.round(inputBtn.files[0].size)+" B";
        else if(val/1024 < 1000)
            return Math.round((inputBtn.files[0].size)/1024)+" KB";
        else if(val/(1024*1024) < 1000)
            return Math.round((inputBtn.files[0].size)/(1024*1024))+" MB";
    }



    let inputBtn = document.getElementById('inputBtn');
    let tab = document.getElementsByClassName('tp-tab');
    let tabCont = document.getElementsByClassName('tab-container');

    document.getElementById('fileName').textContent = (document.getElementById('fileName').textContent) ? document.getElementById('fileName').textContent.slice(0,20)+"..." : 'no files selected';
    document.getElementById('fileSize').textContent = (document.getElementById('fileName').textContent) ? converter(document.getElementById('fileName').textContent) : ' ';

    inputBtn.addEventListener('change',()=>{
        document.getElementById('fileName').textContent = (inputBtn.files[0].name) ? inputBtn.files[0].name.slice(0,20)+"..." : 'no files selected';
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

    let quizChangeBtn = document.getElementById("quizChangeBtn");
    let quizChangeForm = document.getElementById("quiz-change-form");

    const quizLinker = () => {
        document.getElementById('quizChooser').innerHTML = "";

        fetch(`${BASEURL}rcEdit/getQuizListInfo`)
            .then(response => response.json())
            .then(data => {
                data.forEach(row => {
                    document.getElementById('quizChooser').innerHTML +=
                        `<option value="${row[0]}">${row[0]} - ${row[1]}</option>`;
                });
            })
            .catch(err => console.log(err));

        quizChangeForm.style.display = "block";
        quizChangeBtn.style.display = "none";
        document.getElementById("quizEditBtn").style.display = "none";
        document.getElementById("quizUnlinkBtn").style.display = "none";
    }

    quizChangeBtn.onclick = (e) =>{
        e.preventDefault();
        quizLinker();
    }

    // !todo
    document.getElementById('newQuizLink').onclick = (e) => {
        e.preventDefault();
        tabCont[j].style.display = 'none';
        tab[j].classList.remove('active');

    }

    document.getElementById("quizChangeCloseBtn").onclick = (e) =>{
        e.preventDefault();
        quizChangeForm.style.display = "none";
        quizChangeBtn.style.display = "inline";
        document.getElementById("quizEditBtn").style.display = "inline";
        document.getElementById("quizUnlinkBtn").style.display = "inline";
    }

    document.getElementById('quiz-change-form').onsubmit = (e) =>{
        e.preventDefault();
        let form_data = new FormData(document.getElementById('quiz-change-form'));
        fetch(`${BASEURL}rcEdit/changePPQuiz/${paperId}`,{
            method:'post',
            body:form_data
        })
            .then(result => result.text())
            .then(data => {
                if((data.replace(/\s/g, ''))==="Done"){
                    getQuizData(form_data.get('quiz_id'));
                }else{
                    console.log(data);
                }
            })
            .catch(err => console.log(err));
    }

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


</script>
</html>