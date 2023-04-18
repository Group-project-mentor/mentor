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

    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_navbar_3.php" ?>
        
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
                    <a href="#">
                        <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="<?php echo BASEURL?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Class</h1>
                    <h6>My Subjects / videos</h6>
                    <h6>Hello <?php echo $_SESSION['cid'] ?>,</h6>
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
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'TAdd/videoUpload' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_upload_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Upload Video
                                </div>
                            </a>
                            <a class="rc-popup-item" href="<?php echo BASEURL . 'TAdd/video' ?>">
                                <img src="<?php echo BASEURL?>assets/icons/icon_youtube_green.png" class="rc-resource-button-icon-m"/>
                                <div>
                                    Youtube Link
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="rc-video-card-set" id="rc-video-card-set">
                        <?php
                            if(!empty($data[0])){
                                $count = 1;
                                foreach ($data[0] as $row) {
                                    
                                    ?>
                                    <div class='rc-video-card' style="align-items: center;">
                                        <img alt='' src="<?php echo BASEURL."assets/patterns/".$count++.'.png'?>"  />
                                        <a href='#' >
                                            <label><?php echo $row->name ?></label>
                                        </a>
                                        <a href='#' style="background: rgb(24, 100, 55);cursor: pointer;">
                                            <label style="color: white;">View</label>
                                            <img style="width: 15px" src='<?php echo BASEURL?>assets/icons/icon_eye_white.png' alt='' />
                                        </a>
                                    </div>
                           <?php     }
                            }
                            else{ ?>
                                <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php  } ?>

                    </div>
                </div>
                <//?php if(count($data[0]) > 25){ ?>
                <div class="pagination-set">
                    <div class="pagination-set-left">
                        <b>25</b> Results
                    </div>
                    <div class="pagination-set-right">
                        <button> < </button>
                        <div class="pagination-numbers">
                            1 of 10
                        </div>
                        <button> > </button>
                    </div>
                </div>
                <//?php } ?>
        </div>


    </section>
</body>
<script>

    const BASEURL = '<?php echo BASEURL?>';

    document.getElementById('video-add-button').addEventListener('click',()=>{
        document.getElementById('popup-menu').classList.toggle('popup-toggle');
    });

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('rc-video-card-set');

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

</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>


</html>