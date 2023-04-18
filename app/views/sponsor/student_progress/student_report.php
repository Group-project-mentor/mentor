<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php" ?>

    <!-- Right side container -->
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
<!--                <a href="">-->
<!--                    <div class="back-btn">Back</div>-->
<!--                </a>-->
                <a href="#">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                    <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Student Program</h1>
                <h2>Student List</h2>
            </div>

            <!-- bottom part -->
            <section class="bottom-section-grades" style="flex-direction: column;align-items: flex-end;">
                <div class="bottom-section-title">
                    <a class="sponsor-button" href="<?php echo BASEURL?>sponsor/new_student" style="text-decoration: none;">
                        New
                        <img src="<?php echo BASEURL ?>assets/icons/add_teacher.png" alt="" style="width: 20px;">
                    </a>
                </div>
                <div class="sponsor-list-main row-decoration" id="info-table">
                    <div class="sponsor-list-row">
<!--                        <div class="sponsor-list-item sponsor-list-item-title flex-1">-->
<!--                            ID-->
<!--                        </div>-->
                        <div class="sponsor-list-item sponsor-list-item-title flex-3">
                            Name
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-3">
                            Email
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-2">
                            Months Remaining
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-2">
                            Monthly Amount (Rs.)
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">

                        </div>
                    </div>
                    <?php if(empty($data[0])){ ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                NO DATA TO SHOW
                            </div>
                        </div>
                    <?php } else {
                    foreach ($data[0] as $row){
                    ?>
                    <div class="sponsor-list-row">
<!--                        <div class="sponsor-list-item flex-1">-->
<!--                            --><?php //echo $row->id ?>
<!--                        </div>-->
                        <div class="sponsor-list-item flex-3">
                            <?php echo $row->name ?>
                        </div>
                        <div class="sponsor-list-item flex-3">
                            <?php echo $row->email ?>
                        </div>
                        <div class="sponsor-list-item flex-2">
                            <?php echo $row->fundMonths ?>
                        </div>
                        <div class="sponsor-list-item flex-2">
                           <?php echo number_format($row->monthlyAmount, 2, '.', '') ?>
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <a href="<?php echo BASEURL ?>sponsor/see_student">
                                <img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt="" style="width: 20px;">
                            </a>
                        </div>
                    </div>
                    <?php }} ?>
                </div>

                <div class="pagination-set">
                    <div class="pagination-set-left">
                        <b><?php echo ($data[1][0] == $data[1][1] || $data[1][1] == 0) ? count($data[0]) : 3 ?></b> Rows
                    </div>
                    <div class="pagination-set-right">
                        <?php if ($data[1][0] != 1) {?>
                            <a href="<?php echo BASEURL . "sponsor/allstudents/" . ($data[1][0]) - 1 ?>"> < </a>
                        <?php }?>
                        <div class="pagination-numbers">
                            Page <?php echo $data[1][0] ?> of <?php echo ($data[1][1])?$data[1][1]:1 ?>
                        </div>
                        <?php if ($data[1][0] < $data[1][1]) {?>
                            <a href="<?php echo BASEURL . "sponsor/allStudents/" . ($data[1][0] + 1) ?>"> > </a>
                        <?php }?>
                    </div>
                </div>
            </section>

    </div>
</section>

</body>

<script>
    const BASEURL = '<?php echo BASEURL ?>';
    //const USER = <?php //echo $_SESSION['id']?>//;

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('info-table');

    searchButton.onclick = () => {
        let searchTxt = searchInput.value.trim();
        if (searchTxt !== ""){
            cardHolder.innerHTML = `<div class="sponsor-list-row">
            <!--                        <div class="sponsor-list-item sponsor-list-item-title flex-1">-->
            <!--                            ID-->
            <!--                        </div>-->
                                    <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                        Name
                                    </div>
                                    <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                        Email
                                    </div>
                                    <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                        Months Remaining
                                    </div>
                                    <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                        Monthly Amount (Rs.)
                                    </div>
                                    <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    </div>
                                </div>`;
            fetch(`${BASEURL}sponsor/getStudents/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        data.forEach(row => {
                            cardHolder.innerHTML += renderDocumentData(row);
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

    function renderDocumentData (data){
        return `<div class="sponsor-list-row">
<!--                        <div class="sponsor-list-item flex-1">-->
<!--                            -->
<!--                        </div>-->
                        <div class="sponsor-list-item flex-3">
                            ${data.name}
                        </div>
                        <div class="sponsor-list-item flex-3">
                            ${data.email}
                        </div>
                        <div class="sponsor-list-item flex-2">
                            ${data.fundMonths}
                        </div>
                        <div class="sponsor-list-item flex-2">
                            ${data.monthlyAmount.toFixed(2)}
                        </div>
                        <div class="sponsor-list-item flex-1">
                            <a href="${BASEURL}sponsor/see_student">
                                <img src="${BASEURL}assets/icons/icon_eye.png" alt="" style="width: 20px;">
                            </a>
                        </div>
                    </div>`;
    }
</script>
</html>
