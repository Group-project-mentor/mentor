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
            include_once "components/alerts/res_update_success.php";
        } elseif ($_SESSION['message'] == "error") {
            $message = "Upload Unsuccessful !";
            include_once "components/alerts/operationFailed.php";
        } elseif ($_SESSION['message'] == "unlinked"){
            include_once "components/alerts/pastpaperUnlinked.php";
        } elseif ($_SESSION['message'] == "invalidType"){
            $message = "Invalid Type of Resource  Uploaded !";
            include_once "components/alerts/operationFailed.php";
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
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / document / add </h6>
            </div>

            <div class="container-box">

            </div>

                    <div class="rc-upload-box">
                        <form action="<?php echo BASEURL.'rcAdd/addPastPaper/'?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                            <div class="rc-upload-home-title">
                                Upload Past Paper
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
                            <div class="rc-form-group">
                                <label>Answers</label>
                                <div>
                                    <input id="inputBtnAns" type="file" name="answer">
                                    <h3>Choose answer sheet</h3>
                                </div>
                                <p id="fileNameAns" style="text-align:right;"></p>
                                <h5 id="fileSizeAns" style="text-align:right;"></h5>
                            </div>
                            <div class="rc-upload-button">
                                <button type="submit" name="submit">Update</button>
                            </div>

                        </form>
                    </div>
    </div>
    <div class="warning-pop-up">

    </div>
</section>
</body>
<script src="<?php echo BASEURL.'public/javascripts/middleFunctions.js' ?>"></script>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
    const paperId = 0 ;
    let quizId = 0 ;


    let inputBtn = document.getElementById('inputBtn');
    let inputBtnAns = document.getElementById('inputBtnAns');

    document.getElementById('fileName').textContent = (document.getElementById('fileName').textContent) ? refactorFileName(document.getElementById('fileName').textContent) : 'no files selected';
    document.getElementById('fileSize').textContent = (document.getElementById('fileName').textContent) ? converter(document.getElementById('fileName').textContent) : ' ';

    document.getElementById('fileNameAns').textContent = (document.getElementById('fileNameAns').textContent) ? refactorFileName(document.getElementById('fileNameAns').textContent) : 'no files selected';
    document.getElementById('fileSizeAns').textContent = (document.getElementById('fileNameAns').textContent) ? converter(document.getElementById('fileNameAns').textContent) : ' ';

    inputBtn.addEventListener('change',()=>{
        document.getElementById('fileName').textContent = (inputBtn.files[0].name) ? refactorFileName(inputBtn.files[0].name) : 'no files selected';
        document.getElementById('fileSize').textContent = (inputBtn.files[0].size) ? converter(inputBtn.files[0].size) : ' ';
    });

    inputBtnAns.addEventListener('change',()=>{
        document.getElementById('fileNameAns').textContent = (inputBtnAns.files[0].name) ? refactorFileName(inputBtnAns.files[0].name) : 'no files selected';
        document.getElementById('fileSizeAns').textContent = (inputBtnAns.files[0].size) ? converter(inputBtnAns.files[0].size) : ' ';
    });

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