<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
                <a href="#">
                    <a class="back-btn" href="<?php echo BASEURL ?>sponsor/paymentsInProgress">Back</a>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Transaction History</h1>
                <h6>Teacher Home/ Billing/ Transaction History</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <details class="filter-details">
                    <summary>Filters (Click to apply filters)</summary>
                    <form id="filterForm">
                        <div class="rc-resource-header">
                            <div class="filter-container-hr">
                                <h3>Date Start From </h3>
                                <input type="date" name="startDate" class="filter-date" max="<?php echo date('Y-m-d'); ?>" value="<?php echo !empty($_GET['startDate'])?$_GET['startDate']:"" ?>" />
                                <h3> to </h3>
                                <input type="date" name="endDate" class="filter-date" max="<?php echo date('Y-m-d'); ?>" value="<?php echo !empty($_GET['endDate'])?$_GET['endDate']:"" ?>" />
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
                                <h3>Amount from</h3>
                                <input type="number" name="amountStart" class="filter-number" min="0" value="<?php echo !empty($_GET['amountStart'])?$_GET['amountStart']:"" ?>" />
                                <h3>to</h3>
                                <input type="number" name="amountEnd" class="filter-number" min="0" value="<?php echo !empty($_GET['amountEnd'])?$_GET['amountEnd']:"" ?>" />
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


                <div style="margin-top: 30px;">
                    <div class="sponsor-list-main row-decoration">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Pay No
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Amount
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">

                            </div>
                        </div>
                        <?php if (empty($data[0])) {?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO DATA TO SHOW
                                </div>
                            </div>
                        <?php } else {
    foreach ($data[0] as $row) {
        $dateTime = explode(" ", $row->timestamp);
        ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                <?php echo $row->paymentId ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo $dateTime[0] ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo $dateTime[1] ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <?php echo $row->currency ?> <?php echo number_format($row->amount, 2, '.', '') ?>
                            </div>
                            <div class="sponsor-list-item flex-1">
                                <a href="<?php echo BASEURL . 'sponsor/slips/payments/' . $row->paymentId ?>" style="text-decoration: none;color: #056d36;">
                                    See details >
                                </a>
                            </div>
                        </div>
                        <?php }}?>
                    </div>
                </div>

                <div class="pagination-set">
                    <div class="pagination-set-left">
                        <b><?php echo ($data[1][0] == $data[1][1] || $data[1][1] == 0) ? count($data[0]) : 3 ?></b> Rows
                    </div>
                    <div class="pagination-set-right">
                        <?php if ($data[1][0] != 1) {?>
                            <a href="<?php echo BASEURL . "sponsor/transactionHistory/" . ($data[1][0]) - 1 ?>"> < </a>
                        <?php }?>
                        <div class="pagination-numbers">
                            Page <?php echo $data[1][0] ?> of <?php echo ($data[1][1])?$data[1][1]:1 ?>
                        </div>
                        <?php if ($data[1][0] < $data[1][1]) {?>
                            <a href="<?php echo BASEURL . "sponsor/transactionHistory/" . ($data[1][0] + 1) ?>"> > </a>
                        <?php }?>
                    </div>
                </div>

            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
    let filterButton = document.getElementById("filterButton");
    let filterForm = document.getElementById("filterForm");
    let clearBtn = document.getElementById("clearButton");

    filterButton.onclick = (e) =>  {
        e.preventDefault();
        let formData = new FormData(filterForm);
        let url = `${BASEURL}sponsor/transactionHistory/1/?`;
        for (let [key, value] of formData.entries()) {
            url += `${key}=${value}&`;
        }
        window . location . replace(url);
    }

    clearBtn.onclick = (e) =>  {
        e.preventDefault();
        let url = `${BASEURL}sponsor/transactionHistory`;
        window . location . replace(url);
    }
</script>
</html>