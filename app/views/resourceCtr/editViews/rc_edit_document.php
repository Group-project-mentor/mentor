
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Edit Document</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/rc_resources.css' ?> ">
</head>

<body>
    <?php 
        if($data[1] == "success"){
            include_once "components/alerts/res_update_success.php"; 
        }
        elseif($data[1] == "failed"){
            include_once "components/alerts/res_update_failed.php"; 
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
                    <a href="<?php echo BASEURL .'rcResources/documents/'.$_SESSION['gid']."/".$_SESSION["sid"] ?>">
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
                    <div class="rc-resource-header">
                        <h1>EDIT DOCUMENT</h1>
                    </div>
                </div>
                <?php 
                if(empty($data[0])){ 
                    echo "<center style='color:red;font-size:x-large;'>You are not authorized to do this action !</center>";
                }
                else{
                ?>
                <div class="rc-upload-box">
                    <form action="<?php echo BASEURL.'rcEdit/editDocument/'.$data[0][0] ?>" method="POST" enctype="multipart/form-data" class="rc-upload-form">
                        <div class="rc-upload-home-title">
                            Edit document
                        </div>
                        <div class="rc-form-group">
                            <label>Edit title </label>
                            <input type="text" name="title" value="<?php echo $data[0][1] ?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label>New file </label>
                            <div>
                                <input id="inputBtn" type="file" name="resource">
                                <h3>Choose document</h3>
                            </div>
                            <p id="fileName" style="text-align:right;"><?php echo $data[0][2] ?></p>
                            <h5 id="fileSize" style="text-align:right;"></h5>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit">Update</button>
                        </div>
                        
                    </form>
                </div>
                <?php }?>
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