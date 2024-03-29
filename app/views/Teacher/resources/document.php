<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Teacher-documents</title>
        <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
        <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <?php include_once "components/alerts/rc_delete_alert.php"?>

    <?php
    $category = "documents";
    if(!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/CategoryUploadSucess.php";
        }
    }
    ?>

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
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1><?php echo "Grade ".ucfirst($_SESSION['cid']) ?></h1>
                    <h6>My Subjects / <?php echo ucfirst($_SESSION['cid']) ?> / documents</h6>
                </div>

                <!--  -->
                <div class="container-box">
                    <div class="rc-resource-header">
                        <h1>DOCUMENTS</h1>
                        <a href="<?php echo BASEURL . 'TAdd/document' ?>">
                            <div class="rc-add-btn">
                                Add Document
                            </div>
                        </a>
                    </div>
                    <?php
                    if(!empty($data[0])){ ?>
                    <div class="rc-resource-table" id="rc-resource-table">
                        <div class="rc-table-title">
                            <div class="rc-resource-col">Name</div>
                            <div></div>
                        </div>
                                <?php
                                foreach ($data[0] as $row) {?>
                                    <div class='rc-pdf-row'>
                                                <div class='rc-resource-col' style="display: flex;align-items: center;justify-content: flex-start;">
                                                    <div>
                                                        <?php echo $row->name ?>
                                                    </div>
                                                </div>
                                                <div class='rc-quiz-row-btns'>

                                                    <button onclick='delConfirm(<?php echo $row->id ?>,4)' >
                                                        <img src='<?php echo BASEURL ?>assets/icons/icon_delete.png' alt=''>
                                                    </button>
                                                    <a href='<?php echo BASEURL?>TEdit/document/<?php echo $row->id ?>'>
                                                        <img src='<?php echo BASEURL ?>assets/icons/icon_edit.png' alt=''>
                                                    </a>

                                                    
                                                    <a href='<?php echo BASEURL ?>TResources/preview/document/<?php echo $row->id ?>'>
                                                        <img src='<?php echo BASEURL ?>assets/icons/icon_eye.png' alt=''>
                                                    </a>
                                                </div>
                                            </div>
                                <?php }
                                }
                         else{ ?>
                                <h2 class="rc-no-data-msg" style="text-align: center;">No Data to Display</h2>
                            <?php } ?>


                    </div>
                    
                    <div class="pagination-set">
                        <div class="pagination-set-left">
                            <b><?php echo ($data[1][0] == $data[1][1] || $data[1][1] == 0) ? count($data[0]) : paginationRowLimit ?></b> Rows
                        </div>
                        <div class="pagination-set-right">
                            <?php if ($data[1][0] != 1) {?>
                                <a href="<?php echo BASEURL . "TResources/documents/".$_SESSION['cid']."/". ($data[1][0]) - 1 ?>"> < </a>
                                <?php }?>
                                <div class="pagination-numbers">
                                    Page <?php echo $data[1][0] ?> of <?php echo ($data[1][1])?$data[1][1]:1 ?>
                                </div>
                                <?php if ($data[1][0] < $data[1][1]) {?>
                                    <a href="<?php echo BASEURL . "TResources/documents/".$_SESSION['cid']."/" . ($data[1][0] + 1) ?>"> > </a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>

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
            cardHolder.innerHTML = `<div class="rc-table-title">
                                        <div class="rc-resource-col">Name</div>
                                         <div></div>
                                    </div>`;
            fetch(`${BASEURL}TResources/searchResource/documents/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        data.forEach(row => {
                            cardHolder.innerHTML += renderDocumentData(row,USER);
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

 
    function renderDocumentData (data,USER){

            rendered += ` <button onclick='delConfirm(${data.id},4)' >
                                                        <img src='${BASEURL}assets/icons/icon_delete.png' alt=''>
                                                    </button>
                                                    <a href='${BASEURL}TEdit/document/${data.id}'>
                                                        <img src='${BASEURL}assets/icons/icon_edit.png' alt=''>
                                                    </a>`

        rendered +=  `<a href='${data.id}TResources/preview/document/${data.id}'>
                            <img src='${data.id}assets/icons/icon_eye.png' alt=''>
                       </a>
                    </div>
                </div>`

        return rendered;
    }
</script>
<script src="<?php echo BASEURL . '/public/javascripts/t_alert_control.js' ?>"></script>
</html>