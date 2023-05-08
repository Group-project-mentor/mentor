<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzes</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/filterStyles.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>
    <?php 
        // if($data[1] == "dper"){
        //     include_once "components/alerts/no_permission.php"; 
        // }
        // elseif($data[1] == "failed"){
        //     include_once "components/alerts/res_update_failed.php"; 
        // }
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
                    <a href="<?php echo BASEURL ?>rcSubjects">
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
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['sname']) ?> / quizzes</h6>
                </div>

                <!-- -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>QUIZZES</h1>
                        <a href="<?php echo BASEURL?>quiz/create">
                            <div class="rc-add-btn">
                                Add Quiz
                            </div>
                        </a>
                    </div>

                    <details class="filter-details">
                        <summary>Filters (Click to apply filters)</summary>
                        <form id="filterForm">
                            <div class="rc-resource-header">
                                <div class="filter-container-hr">
                                    <h3>Approval : </h3>
                                    <select class="filter-option-set" name="approvals" id="approvals">
                                        <option value="ALL" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'ALL')?"selected":"" ?> >All</option>
                                        <option value="P" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'P')?"selected":"" ?> >Pending</option>
                                        <option value="Y" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'Y')?"selected":"" ?> >Approved</option>
                                        <option value="N" <?php echo (!empty($_GET['approvals']) and $_GET['approvals'] == 'N')?"selected":"" ?> >Rejected</option>
                                    </select>
                                </div>
                                <div class="filter-container-hr">
                                    <h3>Owned by : </h3>
                                    <select class="filter-option-set" name="ownedBy" id="ownedBy">
                                        <option value="ALL" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ALL')?"selected":"" ?> >Owned by Anyone</option>
                                        <option value="ME" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'ME')?"selected":"" ?> >Owned by Me</option>
                                        <option value="THEM" <?php echo (!empty($_GET['ownedBy']) and $_GET['ownedBy'] == 'THEM')?"selected":"" ?>>Owned by Others</option>
                                    </select>
                                </div>
                                <div class="filter-container-hr" >
                                    <button class="filter-btn" type="button" id="clearButton" style="background-color: #AA0000;padding:5px;border-radius:5px;font-size:small;color:white;border-color:transparent;">
                                        <img src="<?php echo BASEURL?>assets/icons/icon-filter-white.png" alt="" style="width: 20px;margin-right: 5px;">
                                        Clear Filter
                                    </button>
                                </div>
                            </div>
                            <div class="rc-resource-header">
                                <div class="filter-container-hr" >
                                </div>
                                <div class="filter-container-hr" >
                                    <button class="filter-btn" type="submit" id="filterButton">
                                        <img src="<?php echo BASEURL?>assets/icons/icon-filter-white.png" alt="" style="width: 20px;margin-right: 5px;">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </details>



                    <section class="quiz-card-list" id="quiz-card-list">
                        <?php
                        if(!empty($data[0])){
                        foreach ($data[0] as $row) {
                            $approval = $this->approvedGenerator($row->approved);
                            ?>
                        <div class="quiz-card-main">
                            <div class="quiz-card-status" style="">
                                <img src='<?php echo BASEURL."assets/icons/".$approval ?>' alt='' class="resource-approved-sign">
                                <?php
                                    switch ($row->approved){
                                        case 'Y':
                                            echo "approved";
                                            break;
                                        case 'N':
                                            echo "rejected";
                                            break;
                                        default :
                                            echo "pending";
                                            break;
                                    }
                                ?>
                            </div>
                            <div class="quiz-card-title">
                                <?php echo $row->name ?>
                            </div>
                            <div class="quiz-card-content">
                                <div class="quiz-card-item">
                                    <?php echo $row->marks ?> Marks
                                </div>
                                <div class="quiz-card-item">
                                    <?php echo isset($data[1][$row->id])?$data[1][$row->id]:0 ?> Questions
                                </div>
                            </div>
                            <div class="quiz-card-button-set">
                                <?php if($this->isCreatedBy($row->creator_id)){ ?>

                                <a class="quiz-card-btn" onclick='delConfirm(<?php echo $row->id ?>,2)'>
                                    <img src='<?php echo BASEURL."assets/icons/icon_delete.png" ?>' alt=''>
                                </a>
                                <a class="quiz-card-btn" href="<?php echo BASEURL.'quiz/questions/'.$row->id ?>">
                                    <img src='<?php echo BASEURL."assets/icons/icon_edit.png" ?>' alt=''>
                                </a>

                                <?php } ?>
                                <a class="quiz-card-btn" href="<?php echo BASEURL.'quizPreview/instructions/'.$row->id ?>">
                                    <img src='<?php echo BASEURL."assets/icons/icon_eye.png" ?>' alt=''>
                                </a>
                            </div>
                        </div>
                        <?php        }
                        }
                        else{ ?>
                            <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                        <?php } ?>
                    </section>
                </div>

                <?php if(count($data[0]) > 25){ ?>
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
    const grade = '<?php echo $_SESSION['gid']?>';
    const subject = '<?php echo $_SESSION['sid']?>';

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('quiz-card-list');

    searchButton.onclick = () => {
        let searchTxt = searchInput.value.trim();
        if (searchTxt !== ""){
            cardHolder.innerHTML = "";
            fetch(`${BASEURL}rcResources/searchResource/quizzes/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        data.forEach(row => {
                            cardHolder.innerHTML += renderQuizData(row,USER);
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

    function renderQuizData (data,USER){
        let approval = approvedGenerator(data.approval);
        let rendered =
          `<div class="quiz-card-main">
                            <div style="position: absolute;left: 3px;bottom: 3px;">
                                <img src='${BASEURL}assets/icons/${approval}' alt='' class="resource-approved-sign">
                            </div>
                            <div class="quiz-card-title">
                                ${data.name}
                            </div>
                            <div class="quiz-card-content">
                                <div class="quiz-card-item">
                                    ${data.marks} Marks
                                </div>
                                <div class="quiz-card-item">
                                    10 Questions
                                </div>
                            </div>
                            <div class="quiz-card-button-set">`;

              if(data.creator_id === USER){
                  rendered += ` <a class="quiz-card-btn" onclick='delConfirm(${data.id},2)'>
                                    <img src='${BASEURL}assets/icons/icon_delete.png' alt=''>
                                </a>
                                <a class="quiz-card-btn" href="${BASEURL}quiz/questions/${data.id}">
                                    <img src='${BASEURL}assets/icons/icon_edit.png' alt=''>
                                </a>`
              }

        rendered +=  `<a class="quiz-card-btn" href="${BASEURL}quizPreview/instructions//${data.id}">
                                    <img src='${BASEURL}assets/icons/icon_eye.png' alt=''>
                                </a>
                            </div>
                        </div>`

        return rendered;
    }

    // Filter data part

    let filterButton = document.getElementById("filterButton");
    let filterForm = document.getElementById("filterForm");
    let clearBtn = document.getElementById("clearButton");

    filterButton.onclick = (e) =>  {
        e.preventDefault();
        let formData = new FormData(filterForm);
        let url = `${BASEURL}rcResources/quizzes/${grade}/${subject}/?`;
        for (let [key, value] of formData.entries()) {
            url += `${key}=${value}&`;
        }
        window . location . replace(url);
    }

    clearBtn.onclick = (e) =>  {
        e.preventDefault();
        let url = `${BASEURL}rcResources/quizzes/${grade}/${subject}`;
        window . location . replace(url);
    }
</script>
<script src="<?php echo BASEURL . '/public/javascripts/rc_alert_control.js' ?>"></script>

</html>