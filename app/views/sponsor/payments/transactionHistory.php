<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher-Transaction History</title>
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
                <div class="rc-resource-header">
                    <h3>Choose the time period </h3>
                </div>
                <div class="rc-resource-header">
                    <h4>From</h4>
                    <a href="">
                        <div class="filter-container">
                            <form>
                                <label for="issue"></label>
                                <select id="issue" name="issue">
                                    <option value="Category1">Filter 1</option>
                                    <option value="Category2">Filter 2</option>
                                    <option value="Category3">Filter 3</option>
                                    <option value="Category4">Filter 4</option>
                                    <option value="Category5">Filter 5</option>
                                    <option value="Category6">Filter 6</option>
                                </select>
                            </form>
                        </div>
                    </a>


                    <div class="filter-container">
                        <form>
                            <label for="issue"></label>
                            <select id="issue" name="issue">
                                <option value="Category1">Filter 1</option>
                                <option value="Category2">Filter 2</option>
                                <option value="Category3">Filter 3</option>
                                <option value="Category4">Filter 4</option>
                                <option value="Category5">Filter 5</option>
                                <option value="Category6">Filter 6</option>
                            </select>
                            <input type="submit" value="Apply" class="green-button" >
                        </form>
                    </div>
                </div>

                <div class="rc-resource-header">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To</h4>
                    <a href="">
                        <div class="filter-container">
                            <form>
                                <label for="issue"></label>
                                <select id="issue" name="issue">
                                    <option value="Category1">Filter 1</option>
                                    <option value="Category2">Filter 2</option>
                                    <option value="Category3">Filter 3</option>
                                    <option value="Category4">Filter 4</option>
                                    <option value="Category5">Filter 5</option>
                                    <option value="Category6">Filter 6</option>
                                </select>
                            </form>
                        </div>
                    </a>


                    <div class="filter-container">
                        <form>
                            <label for="issue"></label>
                            <select id="issue" name="issue">
                                <option value="Category1">Filter 1</option>
                                <option value="Category2">Filter 2</option>
                                <option value="Category3">Filter 3</option>
                                <option value="Category4">Filter 4</option>
                                <option value="Category5">Filter 5</option>
                                <option value="Category6">Filter 6</option>
                            </select>
                            <input type="submit" value="Apply" class="green-button" >
                        </form>
                    </div>
                </div>

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
                        <b><?php echo ($data[1][0] == $data[1][1]) ? count($data[0]) : 3 ?></b> Rows
                    </div>
                    <div class="pagination-set-right">
                        <?php if ($data[1][0] != 1) {?>
                            <a href="<?php echo BASEURL . "sponsor/transactionHistory/" . ($data[1][0]) - 1 ?>"> < </a>
                        <?php }?>
                        <div class="pagination-numbers">
                            Page <?php echo $data[1][0] ?> of <?php echo $data[1][1] ?>
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
</html>