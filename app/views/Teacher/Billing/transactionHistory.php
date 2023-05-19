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
        <?php include_once "components/navbars/t_nav_1.php" ?>

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
                        <a class="back-btn" href="<?php echo BASEURL ?>TBilling/Billing1">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Transaction History</h1>
                    <h6>Teacher Home/ Billing/ Transaction History</h6>
                </div>



                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                    Bank Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                    Account Number
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                    Account Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-5">
                                    Date
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                    Time
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                    Amount
                                </div>

                            </div>
                            <?php if (empty($data[0])) { ?>
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
                                        <div class="sponsor-list-item flex-5">
                                            <?php echo $row->bank_name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-5">
                                            <?php echo $row->account_number ?>
                                        </div>
                                        <div class="sponsor-list-item flex-5">
                                            <?php echo $row->account_name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-5">
                                            <?php echo $dateTime[0] ?>
                                        </div>
                                        <div class="sponsor-list-item flex-3">
                                            <?php echo $dateTime[1] ?>
                                        </div>
                                        <div class="sponsor-list-item flex-3">
                                            <?php echo 'Rs. ' . number_format($row->amount, 2, '.', '') ?>

                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                    <div class="pagination-set">
                        <div class="pagination-set-left">
                            <b><?php echo ($data[1][0] == $data[1][1] || $data[1][1] == 0) ? count($data[0]) : 3 ?></b> Rows
                        </div>
                        <div class="pagination-set-right">
                            <?php if ($data[1][0] != 1) { ?>
                                <a href="<?php echo BASEURL . "TBilling/tHistory/" . ($data[1][0]) - 1 ?>">
                                    < </a>
                                    <?php } ?>
                                    <div class="pagination-numbers">
                                        Page <?php echo $data[1][0] ?> of <?php echo ($data[1][1]) ? $data[1][1] : 1 ?>
                                    </div>
                                    <?php if ($data[1][0] < $data[1][1]) { ?>
                                        <a href="<?php echo BASEURL . "TBilling/tHistory/" . ($data[1][0] + 1) ?>"> > </a>
                                    <?php } ?>
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

    filterButton.onclick = (e) => {
        e.preventDefault();
        let formData = new FormData(filterForm);
        let url = `${BASEURL}sponsor/transactionHistory/1/?`;
        for (let [key, value] of formData.entries()) {
            url += `${key}=${value}&`;
        }
        window.location.replace(url);
    }

    clearBtn.onclick = (e) => {
        e.preventDefault();
        let url = `${BASEURL}sponsor/transactionHistory`;
        window.location.replace(url);
    }
</script>

</html>