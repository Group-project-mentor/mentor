<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Student</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>

<section class="page">
    <?php include_once "components/alerts/sponsor/addStudentConf.php" ?>
    <?php if(!empty($_SESSION['message'])){
        switch ($_SESSION['message']){
            case "Student Added!":
                include_once "components/alerts/sponsor/operationSuccess.php";
                break;
            case "unsuccessful":
                include_once "components/alerts/sponsor/operationFailed.php";
                break;
        }
    } ?>

    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php" ?>


    <!-- Right side container -->
    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL?>sponsor/allStudents">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                        <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Student Program</h1>
                <h2>Find Student</h2>
            </div>

            <!-- bottom part -->
            <section class="bottom-section-grades" style="flex-direction: column;align-items:center;">
                <div class="sponsor-search-comp">
<!--                    <h3>-->
<!--                        Find Student :-->
<!--                    </h3>-->
                    <div class="search-bar">
                        <input type="text" name="" id="search-inp" placeholder="Search Student..." >
                        <a id="search-btn">
                            <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="sponsor-list-main row-decoration" id="info-table">
                    <div class="sponsor-list-row">
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">
                            ID
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-5">
                            Name
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-3">
                            Fund
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
                                <div class="sponsor-list-item flex-1 new-stID">
                                    <?php echo $row->id ?>
                                </div>
                                <div class="sponsor-list-item flex-5 new-name">
                                    <?php echo $row->name ?>
                                </div>
                                <div class="sponsor-list-item flex-3 new-amount">
                                   Rs. <?php echo number_format($row->monthlyAmount, 2, '.', '') ?>
                                </div>
                                <div class="sponsor-list-item flex-1">
                                    <div class="sponsor-list-img-btns">
                                        <a href=""><img src="<?php echo BASEURL ?>assets/icons/icon_eye.png" alt=""></a>
                                        <a class="new-addBtn"><img src="<?php echo BASEURL ?>assets/icons/icon_join.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        <?php }} ?>
                </div>

                <?php if(count($data[0])>25){ ?>
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
            </section>

    </div>
</section>

</body>
<script src="<?php echo BASEURL?>public/javascripts/middleFunctions.js"></script>
<script>
    const BASEURL = '<?php echo BASEURL?>';
    let stIDs = document.getElementsByClassName('new-stID');
    let stNames = document.getElementsByClassName('new-name');
    let stAmounts = document.getElementsByClassName('new-amount');
    let addBtns = document.getElementsByClassName('new-addBtn');
    let confBox = document.getElementById("delConfMsg");
    let accBtn = document.getElementById("acceptBtn");

    function displayConfBox(id, name, amount) {
        document.getElementById('msgTxt').textContent = `Confirm Funding the student ${name},  ${amount} per month ?`;
        accBtn.href = `${BASEURL}sponsor/connectSponsorStudent/${id.trim()}`;
        confBox.classList.remove("hidden");
        confBox.classList.add("message-area");
    }

    function declineConfBox() {
        confBox.classList.remove("message-area");
        confBox.classList.add("hidden");
    }

    for (let i = 0; i < addBtns.length; i++) {
        addBtns[i].onclick = () => {
            displayConfBox(stIDs[i].textContent, upperFirstCase(stNames[i].textContent), stAmounts[i].textContent);
        }
    }


    //const USER = <?php //echo $_SESSION['id']?>//;

    let searchInput = document.getElementById('search-inp');
    let searchButton = document.getElementById('search-btn');
    let cardHolder = document.getElementById('info-table');

    searchButton.onclick = () => {
        let searchTxt = searchInput.value.trim();
        if (searchTxt !== ""){
            cardHolder.innerHTML = `<div class="sponsor-list-row">
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">
                            ID
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-5">
                            Name
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-3">
                            Fund
                        </div>
                        <div class="sponsor-list-item sponsor-list-item-title flex-1">

                        </div>
                    </div>`;
            fetch(`${BASEURL}sponsor/getNewStudents/${searchTxt}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0){
                        data.forEach(row => {
                            cardHolder.innerHTML += renderDocumentData(row);
                            for (let i = 0; i < addBtns.length; i++) {
                                addBtns[i].onclick = () => {
                                    displayConfBox(stIDs[i].textContent, upperFirstCase(stNames[i].textContent), stAmounts[i].textContent);
                                }
                            }
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
                                <div class="sponsor-list-item flex-1 new-stID">
                                    ${data.id}
                                </div>
                                <div class="sponsor-list-item flex-5 new-name">
                                    ${data.name}
                                </div>
                                <div class="sponsor-list-item flex-3 new-amount">
                                   Rs. ${data.monthlyAmount.toFixed(2)}
                                </div>
                                <div class="sponsor-list-item flex-1">
                                    <div class="sponsor-list-img-btns">
                                        <a href=""><img src="${BASEURL}assets/icons/icon_eye.png" alt=""></a>
                                        <a class="new-addBtn"><img src="${BASEURL}assets/icons/icon_join.png" alt=""></a>
                                    </div>
                                </div>
                            </div>`;
    }

</script>

</html>

