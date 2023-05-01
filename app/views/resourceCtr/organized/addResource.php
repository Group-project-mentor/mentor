
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Resource Creator Form</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
<!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?><!-- ">-->

</head>

<body>

<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>
    <?php include_once "components/navbars/rc_nav_2.php"?>
    <div class="content-area">
        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <h1>Connect Resource to Topic</h1>
            </div>
            <div class="top-bar-btns">
                <a onclick="history.back()">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php"?>
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
                <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / Resource to Topic</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="rc-upload-box" >
                    <form method="POST" id="rc-form" >
                        <div class="rc-upload-home-title">
                            <h1 style="padding:5px 0;">Add Resource To Topic No: <?php echo $data[0]->id ?></h1>
                            <label >
                                <label class="" style="padding:3px 20px;background:gray;color:white;border-radius:5px;">Name : <?php echo $data[0]->name ?></label>
                            </label>
                        </div>

                        <div class="rc-form-group" style="flex: 1;">
                            <label> Chooose Resource Type : </label>
                            <label>
                                <select class="pp-quiz-chooser" id="typeChooser">
                                    <option value="0" default>Select Type</option>
                                    <option value="1">Video</option>
                                    <option value="2">PDF</option>
                                    <option value="3">Past Paper</option>
                                    <option value="4">Quiz</option>
                                    <option value="5">Other</option>
                                </select>
                            </label>
                        </div>


                        <div class="rc-form-group" id="resourceChooserContainer" style="display:none;flex: 1;">
                            <hr class="rc-form-hr"/>
                            <label> Chooose Resource : </label>
                            <label>
                                <select class="pp-quiz-chooser"  name="resource" id="resourceChooser">
                                </select>
                                </label>
                        </div>

                        <div class="rc-topic-rsrc-info" id="resourceInfoContainer" style="display:none;">
                            <hr class="rc-form-hr"/>
                            <div class="rc-upload-home-title">
                                Resource Info
                            </div>
                            <div class="rc-form-group">
                                    <label> Resource ID :
                                        <label class="" id="resID"></label>
                                    </label>
                                    <label> Resource Name :
                                        <label class="" id="resName"></label>
                                    </label>
                            </div>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" id="addBtn" style="margin:10px auto;width: 100%;">
                                Add Resource
                            </button>
                        </div>
                    </form>
            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const gradeID = <?php echo $_SESSION['gid'] ?>;
    const subjectID = <?php echo $_SESSION['sid'] ?>;

    const typeChooser = document.getElementById('typeChooser');
    const resourceChooser = document.getElementById('resourceChooser');
    const resourceChooserContainer = document.getElementById('resourceChooserContainer');
    const resourceInfoContainer = document.getElementById('resourceInfoContainer');

    let resourcesByType = <?php echo json_encode($data[2]) ?>;
    const topicID = <?php echo $data[0]->id ?>;
    let choosenType = "";
    let resourceID = 0;

    console.log(resourcesByType);


    typeChooser.addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        switch (selectedValue) {
            case "0":
                resourceChooserContainer.style.display = "none";
                resourceInfoContainer.style.display = "none";
                break;
            case "1":
                choosenType = "videos";
                break;
            case "2":
                choosenType = "pdfs";
                break;
            case "3":
                choosenType = "pastpapers";
                break;
            case "4":
                choosenType = "quizzes";
                break;
            case "5":
                choosenType = "others";
                break;
            default:
                choosenType = "";
                break;
        }
        resourceChooser.innerHTML = resourceChooserChange(choosenType);
    });

    resourceChooser.addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        resourceID = selectedValue;
        console.log(resourceID);
        infoLoader(choosenType, selectedValue);
    });

    function resourceChooserChange(type){
        resourceChooserContainer.style.display = "flex";
        resourceInfoContainer.style.display = "none";
        let htmlTxt = "";
        if(resourcesByType[type] == undefined || resourcesByType[type].length === 0){
                htmlTxt = `<option value="0">No Resources</option>`;
        }else{
            htmlTxt += `<option value="0">Choose Resource</option>`;
            resourcesByType[type].forEach((resource) => {
                htmlTxt += `<option value="${resource.id}">${resource.name}</option>`;
            });
        }
        return htmlTxt;
    }

    function infoLoader(type, selectedValue){
        if(selectedValue === "0"){
            resourceInfoContainer.style.display = "none";
        }else{
            const resource = resourcesByType[type].find( r => r.id == selectedValue);
            document.getElementById('resID').innerHTML = resource.id;
            document.getElementById('resName').innerHTML = resource.name;
            resourceInfoContainer.style.display = "block";
        }
    }

    document.getElementById('addBtn').addEventListener('click',(e)=>{
        e.preventDefault();     
        if(resourceID != 0){
            let formData = new FormData();
            formData.append('resource',resourceID);
            formData.append('topic',topicID);

            fetch(`${BASEURL}rcAdd/connectToTopic`,{
                method: 'POST',
                body:formData 
            })
            .then(res => res.json())
            .then(data => {
                if(data.status === "success"){
                    makeSuccess("Resource Added Successfully");
                    console.log(data);
                    setTimeout(() => {
                        window.location.href = `${BASEURL}rcResources/organized/${gradeID}/${subjectID}`;
                    }, 1000);
                }else{
                    makeError("Resource Adding Failed");
                }
            })
            .catch(err => {
                makeError("Something Went Wrong");
            });
        }else{
            makeError("Please Select a Resource");
        }

    })


</script>

</html>