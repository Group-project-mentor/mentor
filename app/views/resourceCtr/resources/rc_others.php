<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource other</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <?php
    $category = "others";
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/categoryUploadSuccess.php";
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
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / others</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>RESOURCES</h1>
                        <a href="<?php echo BASEURL . 'rcAdd/other' ?>">
                            <div class="rc-add-btn">
                                Add Resource
                            </div>
                        </a>
                    </div>
                    <?php
                    $types = ['pdf', 'png', 'jpg', 'bmp', 'js', 'txt'];
                    if(!empty($data)){?>
                    <div class="rc-resource-table" id="rc-resource-table">
                        <div class="rc-resource-row rc-table-title">
                            <div class="rc-resource-col">Resource name</div>
                            <div class="rc-resource-col">Type</div>
                            <div></div>
                        </div>
                        <?php
                                foreach ($data as $row) {
                                    $approval = $this->approvedGenerator($row->approved);
                                    ?>
                                    <div class='rc-resource-row'>
                                        <div class='rc-resource-col' style="display: flex;align-items: center;justify-content: flex-start;">
                                            <img src='<?php echo BASEURL."assets/icons/".$approval ?>' alt='' class="resource-approved-sign">
                                            <div>
                                                <?php echo $row->name ?>
                                            </div>
                                        </div>
                                            <div class='rc-resource-col'><?php echo $row->type ?></div>
                                            <div class='rc-quiz-row-btns'>
                                                <?php if($this->isCreatedBy($row->creator_id)){ ?>
                                                <a onclick='delConfirm(<?php echo $row->id ?>,5)'>
                                                    <img src='<?php echo BASEURL ?>assets/icons/icon_delete.png' alt=''>
                                                </a>
                                                <a href='<?php echo BASEURL."rcEdit/other/".$row->id ?>'>
                                                    <img src='<?php echo BASEURL ?>assets/icons/icon_edit.png' alt=''>
                                                </a>
                                <?php } echo (in_array($row->type,$types)) ?"
                                                <a href='".BASEURL."rcResources/preview/other/".$row->id."'>
                                                <img src='".BASEURL."assets/icons/icon_eye.png' alt=''>
                                                </a>" : "<a></a>";
                                echo "
                                            </div>
                                    </div>
                                    ";
                                    }
                                    }else{ ?>
                            <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                            <?php } ?>

                        <?php if(count($data) > 25){ ?>
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
                        <?php } ?>

                    </div>
    </section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    const USER = <?php echo $_SESSION['id']?>;

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('rc-resource-table');

    searchButton.onclick = () => {
        let searchTxt = searchInput.value.trim();
        if (searchTxt !== ""){
            cardHolder.innerHTML = `<div class="rc-resource-table" id="rc-resource-table">
                                            <div class="rc-resource-row rc-table-title">
                                            <div class="rc-resource-col">Resource name</div>
                                        <div class="rc-resource-col">Type</div>
                                        <div></div>
                                    </div>`;
            fetch(`${BASEURL}rcResources/searchResource/others/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        data.forEach(row => {
                            cardHolder.innerHTML += renderOthersData(row,USER);
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

    function renderOthersData (data,USER){
        let approval = approvedGenerator(data.approval);
        let rendered =
            ` <div class='rc-resource-row'>
                                        <div class='rc-resource-col' style="display: flex;align-items: center;justify-content: flex-start;">
                                            <img src='${BASEURL}assets/icons/${approval}' alt='' class="resource-approved-sign">
                                            <div>
                                                ${data.name}
                                            </div>
                                        </div>
                                            <div class='rc-resource-col'>${data.type}</div>
                                            <div class='rc-quiz-row-btns'>`;

        if(data.creator_id === USER){
            rendered += `<a onclick='delConfirm(${data.id},5)'>
                                                    <img src='${BASEURL}assets/icons/icon_delete.png' alt=''>
                                                </a>
                                                <a href='${BASEURL}rcEdit/other/${data.id}'>
                                                    <img src='${BASEURL}assets/icons/icon_edit.png' alt=''>
                                                </a>`
        }

        rendered +=  `<a href='${BASEURL}rcResources/preview/other/${data.id}'>
                        <img src='${BASEURL}assets/icons/icon_eye.png' alt=''>
                      </a>
                     </div>
                   </div>`

        return rendered;
    }
</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>