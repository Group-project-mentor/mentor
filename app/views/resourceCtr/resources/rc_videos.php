<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <?php
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            $message = "Video updated successfully !";
            include_once "components/alerts/operationSuccess.php";
        }elseif ($_SESSION['message'] == "failed"){
            $message = "Video updating failed !";
            include_once "components/alerts/operationFailed.php";
        }elseif ($_SESSION['message'] == "fillAllData"){
            $message = "Please fill required data !";
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
                    <input type="text" name="" id="search-inp" placeholder="Search...">
                    <a id="search-btn">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL . 'rcSubjects' ?>">
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
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / videos</h6>
                </div>

                <!--  -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>VIDEOS</h1>
<!--                        <a href="--><?php //echo BASEURL . 'rcAdd/video' ?><!--">-->
<!--                            <div class="rc-add-btn">-->
<!--                                Add Video-->
<!--                            </div>-->
<!--                        </a>-->
                        <div class="rc-add-btn" id="video-add-button" style="align-items: center;">
                            Add Video
                            <img src="<?php echo BASEURL?>assets/icons/icon_down_white.png" alt="profile" class="rc-resource-button-icon-s">
                        </div>
                        <div class="rc-popup-menu popup-toggle" id="popup-menu">
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'rcAdd/videoUpload' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_upload_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Upload Video
                                </div>
                            </a>
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'rcAdd/video' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_youtube_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Youtube Link
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    include_once "components/filters/resourceFilter.php"; ?>

                    <div class="rc-video-card-set" id="rc-video-card-set">
                        <?php
                            if(!empty($data[0])){
                                $count = 1;
                                foreach ($data[0] as $row) {
                                    $approval = $this->approvedGenerator($row->approved);
                                    ?>
                                    <div class='rc-video-card' style="align-items: center;">
                                        <img alt='' src="<?php echo BASEURL."assets/patterns/".(($count++)%10).'.png'?>"  />
                                        <a href='<?php echo BASEURL."rcResources/preview/video/".$row->id ?>' >
                                            <label><?php echo $row->name ?></label>
                                        </a>
                                        <a href='<?php echo BASEURL."rcResources/preview/video/".$row->id ?>' style="background: rgb(24, 100, 55);cursor: pointer;">
                                            <label style="color: white;">View</label>
                                            <img style="width: 15px" src='<?php echo BASEURL?>assets/icons/icon_eye_white.png' alt='' />
                                        </a>
                                        <div style="color:black;position: absolute;left: 0;top: 0;display: flex;justify-content:center;justify-self:center;align-items:center;margin:auto;padding: 5px 10px;background:rgba(255,255,255,0.41);border-radius: 10px;backdrop-filter: blur(5px);">
                                            <img src='<?php echo BASEURL."assets/icons/".$approval ?>' alt='' class="resource-approved-sign">
                                            <?php
                                            switch ($row->approved){
                                                case 'Y':
                                                    echo "Approved";
                                                    break;
                                                case 'N':
                                                    echo "Rejected";
                                                    break;
                                                default :
                                                    echo "Pending";
                                                    break;
                                            }
                                            ?>
                                        </div>
                                    </div>
                           <?php     }
                            }
                            else{ ?>
                                <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php  } ?>

                    </div>
                </div>
                
                <div class="pagination-set" id="pagination-set">
                    <div class="pagination-set-left">
                        <b><?php echo ($data[1][0] == $data[1][1] || $data[1][1] == 0) ? count($data[0]) : paginationRowLimit ?></b> Videos
                    </div>
                    <div class="pagination-set-right">
                        <?php if ($data[1][0] != 1) {?>
                            <a href="<?php echo BASEURL . "rcResources/videos/".$_SESSION['gid']."/".$_SESSION['sid']."/". ($data[1][0] - 1)."/".($data[1][2]) ?>"> < </a>
                        <?php }?>
                        <div class="pagination-numbers">
                            Page <?php echo $data[1][0] ?> of <?php echo ($data[1][1])?$data[1][1]:1 ?>
                        </div>
                        <?php if ($data[1][0] < $data[1][1]) {?>
                            <a href="<?php echo BASEURL . "rcResources/videos/".$_SESSION['gid']."/".$_SESSION['sid']."/". ($data[1][0] + 1)."/".($data[1][2]) ?>"> > </a>
                        <?php }?>
                    </div>
                </div>
        </div>


    </section>
</body>
<script>

    const BASEURL = '<?php echo BASEURL?>';
    const PAGE = <?php echo $data[1][0] ?>;
    const grade = <?php echo $_SESSION['gid']?>;
    const subject = <?php echo $_SESSION['sid']?>;

    document.getElementById('video-add-button').addEventListener('click',()=>{
        document.getElementById('popup-menu').classList.toggle('popup-toggle');
    });

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('rc-video-card-set');
    let paginationSet = document.getElementById('pagination-set');

    searchButton.onclick = () => {
        let searchTxt = searchInput.value.trim();
        if (searchTxt !== ""){
            cardHolder.innerHTML = "";
            fetch(`${BASEURL}rcResources/searchResource/videos/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        let count = 0;
                        data.forEach(row => {
                            let approval = row.approval;
                            let renderedData = `
                                <div class='rc-video-card' style="align-items: center;">
                                        <img alt='' src="${BASEURL}assets/patterns/${++count}.png" />
                                        <a href='${BASEURL}rcResources/preview/video/${row.id}' >
                                            <label>${row.name}</label>
                                        </a>
                                        <a href='${BASEURL}rcResources/preview/video/${row.id}' style="background: rgb(24, 100, 55);cursor: pointer;">
                                            <label style="color: white;">View</label>
                                            <img style="width: 15px" src='${BASEURL}assets/icons/icon_eye_white.png' alt='' />
                                        </a>
                                        <div style="position: absolute;left: 15px;top: 15px;">
                                            <img src=${BASEURL}assets/icons/${approval}' alt='' class="resource-approved-sign">
                                        </div>
                                    </div>
                            `;
                            cardHolder.innerHTML += renderedData;
                            paginationSet.style.display = "none";
                        })
                    }else {
                        cardHolder.innerHTML = `<h2 class="rc-no-data-msg" style="text-align:center;">No Data to Display</h2>`;
                    }
                })
                .catch(e => console.log(e));
        }else {
            location.reload();
        }
    }

    function approvedGenerator(approval) {
        if (approval === 'N') {
            return 'icon_not_approved.png';
        }
        else if (approval === 'Y') {
            return 'icon_approved.png';
        }
        else {
            return 'icon_pending.png';
        }
    }

    // Filter data part

    let filterButton = document.getElementById("filterButton");
    let filterForm = document.getElementById("filterForm");
    let clearBtn = document.getElementById("clearButton");

    filterButton.onclick = (e) =>  {
        e.preventDefault();
        let formData = new FormData(filterForm);
        let url = `${BASEURL}rcResources/videos/${grade}/${subject}/${PAGE}/?`;
        for (let [key, value] of formData.entries()) {
            url += `${key}=${value}&`;
        }
        window . location . replace(url);
    }

    clearBtn.onclick = (e) =>  {
        e.preventDefault();
        let url = `${BASEURL}rcResources/videos/${grade}/${subject}/${PAGE}`;
        window . location . replace(url);
    }

</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>


</html>