<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher-Transaction History</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
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
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
                <a href="#">
                    <a class="back-btn" href="<?php echo BASEURL ?>sponsor/paymentsInProgress">Back</a>
                </a>
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo  BASEURL ?>privateclass/profile">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
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
                                Number
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                Receiver
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                Account No
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                Amount
                            </div>
                        </div>

                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                01
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>

                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                02
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>

                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                03
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                03
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item flex-1">
                                03
                            </div>
                            <div class="sponsor-list-item flex-3">
                                Mr.Kamal Kumara
                            </div>
                            <div class="sponsor-list-item flex-3">
                                5566-8898-0999
                            </div>
                            <div class="sponsor-list-item flex-2">
                                09/10/2020
                            </div>
                            <div class="sponsor-list-item flex-1">
                                20:00
                            </div>
                            <div class="sponsor-list-item flex-2">
                                Rs: 2000.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
</body>
</html>