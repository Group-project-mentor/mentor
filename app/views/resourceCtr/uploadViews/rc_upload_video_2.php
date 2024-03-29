
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>


<?php
        if (isset($_SESSION['message']) && $_SESSION['message'] == "success") {
            $message = "Video updated successfully !";
            include_once "components/alerts/operationSuccess.php";
        }elseif (isset($_SESSION['message']) && $_SESSION['message'] == "error"){
            $message = "Video updating failed !";
            include_once "components/alerts/operationFailed.php";
        }elseif (isset($_SESSION['message']) && $_SESSION['message'] == "dataNotFilled"){
            $message = "Please enter completed data !";
            include_once "components/alerts/operationFailed.php";
        }
    ?>
<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>
    <!-- Navigation panel -->
    <?php include_once "components/navbars/rc_nav_2.php" ?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL .'rcResources/videos/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
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
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / video / add </h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>ADD VIDEO</h1>
                </div>
            </div>
            <div class="rc-upload-box">
                <form action="<?php echo BASEURL.'rcAdd/addVideo'?>" enctype="multipart/form-data" method="POST" class="rc-upload-form" id="upload-form">
                    <div class="rc-upload-home-title">
                        Upload Video
                    </div>
                    <div class="rc-form-group">
                        <label> Add title * : </label>
                        <input type="text" name="title" placeholder="title" />
                    </div>
                    <div class="rc-form-group">
                        <label> Lecturer : </label>
                        <input type="text" name="lec" placeholder="lecturer or source"/>
                    </div>
                    <div class="rc-form-group">
                        <label> Video Description :  </label>
                        <textarea class="rc-video-descr" placeholder="Description" name="descr"></textarea>
                    </div>
                    <div class="rc-form-group">
                        <label>Upload Video File * : </label>
                        <div>
                            <input id="inputBtn" type="file" name="resource" >
                            <h3>Drag or Choose the file</h3>
                            <img id="upload-video" class="resource-upload-animated" src="<?php echo BASEURL?>assets/icons/gif_upload.gif" />
                        </div>
                        <section class="progress-container hidden-toggle" id="progress-container" >
                            <img alt="" id="upload-video" src="<?php echo BASEURL?>assets/icons/icon_incorrect.png" />
                            <progress value="46" max="100" id="progress-bar"></progress>
                            <p id="progress-percent">46%</p>
                        </section>

                        <p id="fileName" style="text-align:right;">no file selected</p>
                        <h5 id="fileSize" style="text-align:right;"></h5>
                    </div>
                    <div class="rc-upload-button">
                        <button type="submit" name="submit" col="200">Add Video</button>
                    </div>

                </form>
            </div>
    </div>
</section>
</body>
<script src="<?php echo BASEURL?>javascripts/middleFunctions.js"></script>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const uploadForm = document.getElementById('upload-form');
    const uploadBtn = document.getElementById('inputBtn');
    const progressContainer = document.getElementById('progress-container');
    const progressBar = document.getElementById('progress-bar');
    const progressTxt = document.getElementById('progress-percent');

    uploadBtn.onchange = ({target}) => {
        let file = target.files[0];
        if(file){
            let name = file.name;
            document.getElementById('fileName').textContent = (file.name) ? file.name.slice(0,20)+"..." : 'No files selected';
            document.getElementById('fileSize').textContent = (file.size) ? converter(file.size) : '';
            uploadFile(name);
        }
    }

    uploadForm.onsubmit = (e) => {
        e.preventDefault();
        let formData = new FormData(uploadForm);
        fetch("<?php echo BASEURL?>rcAdd/addVideoUploadForm",{
            method:"post",
            body:formData
            })
            .then(response => response.text())
            .then(data => {
                if(data.trim() === "success"){
                    setTimeout(()=>{
                        makeSuccess("Video Saved !");
                    }, 2000)
                    history.back();
                }else{
                    makeError("Video Saving Error !");
                }
            })
            .catch(e => {
                console.log(e);
            })
    }

// TODO : Should made the cancellation part of the uploading

    const uploadFile = () => {
        progressContainer.classList.remove('hidden-toggle');
        progressBar.style.display = 'inline';
        let xhr = new XMLHttpRequest();
        xhr.open("POST","<?php echo BASEURL?>rcAdd/addVideoUpload");
        xhr.upload.addEventListener('progress',
            ({loaded, total}) => {
                let progressLoaded = Math.floor((loaded / total) * 100);
                progressBar.value = progressLoaded;
                progressTxt.textContent = `${progressLoaded}%`;
                if(progressLoaded===100){
                    progressTxt.textContent = `completed`;
                    progressBar.style.display = 'none';
                }
            });
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // handle the response here
                // document.getElementById('errerr').innerHTML = xhr.responseText;
            }
        };

        let formData = new FormData(uploadForm);
        xhr.send(formData);
    }
</script>
</html>