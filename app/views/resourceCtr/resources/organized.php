<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>RC-Cources</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
<?php include_once "components/alerts/rc_delete_alert.php"?>
<?php
$category = "documents";
if(!empty($_SESSION['message'])) {
    if ($_SESSION['message'] == "success") {
        include_once "components/alerts/categoryUploadSuccess.php";
    }
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
                <a href="<?php echo BASEURL . 'rcSubjects' ?>">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
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
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / resources</h6>
            </div>

            <!--  -->
            <div class="container-box">
                <div class="rc-resource-header">
                    <h1>RESOURCES</h1>
                    <div style="display:flex;">
                        <a href="<?php echo BASEURL . 'rcAdd/newTopic/'.$_SESSION['gid'].'/'.$_SESSION['sid'] ?>" style="display:flex;justify-content:center;align-items:center;">
                            <div class="rc-add-btn">
                                <img src="<?php echo BASEURL ?>public/assets/icons/add_teacher.png" alt="" style="width:20px;margin-right:10px;">
                                Add
                            </div>
                        </a>
                        <a id="saveButton" style="display:flex;justify-content:center;align-items:center;">
                            <div class="rc-add-btn">
                                <img src="<?php echo BASEURL ?>public/assets/icons/icon-save-white.png" alt="" style="width:20px;margin-right:10px;">
                                Save
                            </div>
                        </a>
                        <div class="rc-add-btn" id="editToggle">
                            <img id="editToggleImg" src="<?php echo BASEURL ?>public/assets/icons/icon_move.png" style="width:25px;">
                        </div>
                    </div>
                </div>

                <div class="rc-resource-table" id="resourceContainer">
                </div>
            </div>
        </section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL?>";
    let topicData = <?php echo json_encode($data[0]) ?>;
    let editValue = true;
    let resourceData = {};

    let loading = true; // ! for loading purposes

    let topicOrderStr = <?php echo json_encode($data[1]) ?>;
    let topicOrder = [];
    setTopicOrder();
    console.log(topicOrder);

    let editToggle = document.getElementById('editToggle');
    const upShiftBtns = document.getElementsByClassName('upShift');
    const downShiftBtns = document.getElementsByClassName('downShift');
    const resourceContainer = document.getElementById('resourceContainer');

    document.getElementById('saveButton').addEventListener('click', () => {
        saveOrder();
    });

    editToggle.addEventListener('click', () => {
        editValue = !editValue;
        if (editValue) {
            for (let i = 0; i < upShiftBtns.length; i++) {
                upShiftBtns[i].style.display = 'block';
            }
            for (let i = 0; i < downShiftBtns.length; i++) {
                downShiftBtns[i].style.display = 'block';
            }
            document.getElementById('editToggleImg').src = '<?php echo BASEURL ?>public/assets/icons/icon_move.png';
        } else {
            for (let i = 0; i < upShiftBtns.length; i++) {
                upShiftBtns[i].style.display = 'none';
            }
            for (let i = 0; i < downShiftBtns.length; i++) {
                downShiftBtns[i].style.display = 'none';
            }
            document.getElementById('editToggleImg').src = '<?php echo BASEURL ?>public/assets/icons/icon_not_move.png';

        }
    });

    loadingRender();    // ! loading screen

    fetch(`${BASEURL}rcResources/getResourcesTopics`)
        .then(response => response.json())
        .then(data => {
            resourceData = data;
            resourceContainer.innerHTML = renderContent();
            makeShiftButtons();
            loading = false;
            // console.log(resourceData);
            // console.log(topicData);
        })
        .catch(error => console.log(error));

    function renderContent(){
        let htmlContent = '';
        if(topicOrder.length == 0){
            htmlContent += `<div class="rc-org-info-row">No organized topics for this subject</div>`;
        }else{
            for (let i = 0; i < topicOrder.length; i++) {
                let topicName = topicData[topicOrder[i]].name;
                let description = topicData[topicOrder[i]].description;
                htmlContent += renderTopic(topicOrder[i],topicName, description);
                if(resourceData[topicOrder[i]] == undefined || resourceData[topicOrder[i]].length == 0){
                    htmlContent += `<div class="rc-org-info-row">No resources for this topic</div>`;
                }else{
                    for(let item of resourceData[topicOrder[i]]){
                        htmlContent += renderResource(item);
                    }
                }
                htmlContent += `<div class="rc-org-padding"></div>`;

            }
        }
        return htmlContent;
    }


    function setTopicOrder(){
        if(topicOrderStr != ''){
            let stringArray = topicOrderStr.split(',');
            topicOrder = stringArray.map(no => parseInt(no, 10));
        }else{
            topicOrder = [];
        }
        // for(let key in topicData){
        //     topicOrder.push(key);
        // }
    }

    function renderTopic(id, topicName, description){
        return `
            <div class="rc-org-topic-row">
                        <div class="rc-org-row-btns">
                            <button class="upShift" type="button">
                                <img src="${BASEURL}public/assets/icons/up_arrow_green.png" alt="up" >
                            </button>
                            <button class="downShift" type="button">
                                <img src="${BASEURL}public/assets/icons/down_arrow_green.png" alt="down" >
                            </button>
                            <div class="rc-org-topic">
                                <h3>${topicName}</h3>
                            </div>
                        </div>
                        <div class="rc-org-row-btns">
                            <a href="${BASEURL}rcDelete/removeTopic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a href="${BASEURL}rcEdit/topic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon_edit.png" alt="edit">
                            </a>
                            <a href="${BASEURL}rcAdd/toTopic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon-add-green.png" alt="add" class="add-rsrc">
                            </a>
                        </div>
                    </div>
                    <hr class="rc-topic-line">
        `;
    }

    function renderResource(item){
        return `
            <div class="rc-org-row">
                        <img src="${BASEURL}public/assets/icons/${resourceTypeImage(item.type)}.png" alt="delete">
                        <div class="rc-org-col">
                            ${item.rsrc_id}
                        </div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-row-btns">
                            <a href="${BASEURL}rcDelete/removeReference/${item.rsrc_id}">
                                <img src="${BASEURL}public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a href="${previewLink(item.type,item.rsrc_id)}">
                                <img src="${BASEURL}public/assets/icons/icon_eye.png" alt="edit">
                            </a>
                        </div>
                    </div>
        `;
    }

    function resourceTypeImage(type){
        let name = 'icon_default_org';
        switch (type) {
            case 'video':
                name = "icon_video_org";
                break;
            case 'pdf':
                name = "icon_pdf_org";
                break;
            case 'paper':
                name = "icon_paper_org";
                break;
            case 'other':
                name = "icon_other_org";
                break;
            case 'quiz':
                name = "icon_quiz_org";
                break;
        }
        return name;
    }

    function previewLink(type, $id){
        let link = '';
        switch (type) {
            case 'video':
                link = `${BASEURL}rcResources/Preview/video/${$id}`;
                break;
            case 'pdf':
                link = `${BASEURL}rcResources/Preview/document/${$id}`;
                break;
            case 'paper':
                link = `${BASEURL}rcResources/Preview/pastpaper/${$id}`;
                break;
            case 'other':
                link = `${BASEURL}rcResources/Preview/other/${$id}`;
                break;
            case 'quiz':
                link = `${BASEURL}quizPreview/instructions/${$id}`;
                break;
        }
        return link;
    }

    function loadingRender(){
        if(loading){
            resourceContainer.innerHTML = `<img style="width:50px;align-self:center;" src="${BASEURL}public/assets/icons/icon_loading.gif">`;
        }
    }

    function saveOrder(){
        let newOrder = topicOrder.join(',');
        console.log(newOrder);
        let formData = new FormData();
        formData.append('order', newOrder);
        fetch(`${BASEURL}rcResources/saveTopicOrder`,{
            method: 'POST',
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if(data.status == 'success'){
                    makeSuccess('Topic order saved successfully');
                    // setTimeout(() => {
                    //         location . reload();
                    //     }, 2000);
                }else{
                    makeError('Error saving topic order');
                }
            })
            .catch(error => {
                makeError('Error saving topic order');
            });
    }

    function makeShiftButtons(){
        let upShifts = document.querySelectorAll('.upShift');
        let downShifts = document.querySelectorAll('.downShift');
        for(let i = 0; i < upShifts.length; i++){
            upShifts[i].addEventListener('click',function(){
                if(i > 0){
                    let temp = topicOrder[i];
                    topicOrder[i] = topicOrder[i-1];
                    topicOrder[i-1] = temp;
                    resourceContainer.innerHTML =  renderContent();
                    makeShiftButtons();
                    // console.log(topicOrder);
                }
            });
        }
        for(let i = 0; i < downShifts.length; i++){
            downShifts[i].addEventListener('click',function(){
                if(i < downShifts.length - 1){
                    let temp = topicOrder[i];
                    topicOrder[i] = topicOrder[i+1];
                    topicOrder[i+1] = temp;
                    resourceContainer.innerHTML=  renderContent();
                    makeShiftButtons();
                    // console.log(topicOrder);
                }
            });
        }
    }



</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>
</html>