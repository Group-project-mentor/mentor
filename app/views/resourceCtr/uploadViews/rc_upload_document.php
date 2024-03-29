
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Document</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php 
        if(isset($_SESSION['message']) && $_SESSION['message']== "error"){
            include_once "components/alerts/uploadFailed.php";
        }elseif (isset($_SESSION['message']) && $_SESSION['message'] == "fillAllData"){
            $message = "Please fill required data !";
            include_once "components/alerts/operationFailed.php";
        }elseif (isset($_SESSION['message']) && $_SESSION['message'] == "invalidType"){
            $message = "Invalid type of file entered !";
            include_once "components/alerts/operationFailed.php";
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
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL .'rcResources/documents/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
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

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>ADD DOCUMENT</h1>
                    </div>
                </div>
                <div class="rc-upload-box">
                    <form action="<?php echo BASEURL.'rcAdd/addDocument/'.$_SESSION['gid']."/".$_SESSION['sid']?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Upload or drag and drop the document
                        </div>

                        <div class="rc-form-group">
                            <label>Title </label>
                            <input type="text" name="title" placeholder="title for the file"/>
                        </div>
                        <div class="rc-form-group">
                            <label>Add file </label>
                            <div>
                                <input id="inputBtn" type="file" name="resource">
                                <h4>Drag or choose file</h4>
                                <img id="upload-image" class="resource-upload-animated" src="<?php echo BASEURL?>assets/icons/gif_upload.gif" />
                            </div>
                            <p id="fileName" style="text-align:right;font-size: small;">no files selected</p>
                            <h5 id="fileSize" style="text-align:right;"></h5>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit">Upload</button>
                        </div>
                        
                    </form>
                </div>

        </div>

    </section>
</body>
<script>
    let inputBtn = document.getElementById('inputBtn');

    inputBtn.addEventListener('change',()=>{
        document.getElementById('fileName').textContent = (inputBtn.files[0].name) ? inputBtn.files[0].name.slice(0,20)+"..." : 'no files selected';
        document.getElementById('fileSize').textContent = (inputBtn.files[0].size) ? converter(inputBtn.files[0].size) : ' ';
    })

    const converter = (val) => {
        if(val < 1000)
            return Math.round(inputBtn.files[0].size)+" B";
        else if(val/1024 < 1000)
            return Math.round((inputBtn.files[0].size)/1024)+" KB";
        else if(val/(1024*1024) < 1000)
            return Math.round((inputBtn.files[0].size)/(1024*1024))+" MB";
    }   
</script>
</html>