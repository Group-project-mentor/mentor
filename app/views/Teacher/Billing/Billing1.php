<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Billing</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_card_set.css' ?> ">
    <style>
        .box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 300px;
            height: 150px;
            border: 1px solid #ccc;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .withdraw-box {
            float: left;
            margin-left: 5cm;


        }

        .balance-box {
            float: left;
            margin-left: 5cm;


        }

        .amount-box {
            margin: 70px;
            float: left;
            margin-left: 5cm;
            width: 800px;
            height: 150px;

        }


        .amount {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .amount span {
            margin-right: 5px;
            font-size: 3rem;
        }

        .withdraw-amount {
            margin: 0 auto;
            text-align: center;
        }

        .withdraw-btn {
            background-color: #186537;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 10px;
        }

        .withdraw-amount-input {
            width: 300px;
            height: 40px;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <section class="page">

        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">

                    <h1>Billing</h1>
                    <h6>Teacher Home/ Members details/change host</h6>
                    <br>

                    <div class="subject-heading-container" style="border-radius: 2px; display: flex; width:450px;">
                        <div style="margin: 0 5px;  flex: 1;">
                            <label>
                                <select class="grade-chooser" id="gradeChooser" name="question">
                                    <option value="0">Class</option>
                                    <?php
                                    if (!empty($data[2])) {
                                        foreach ($data[2] as $row) { ?>
                                            <option value="<?php echo $row->cid ?>"><?php echo $row->cid ?>-<?php echo $row->cname ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </label>
                        </div>
                        <div style="margin: 0 5px; flex: 1;">
                            <label>
                                <select class="grade-chooser" id="subjectChooser" name="question">
                                    <option value="0">Year</option>
                                    <option value="1">2023</option>
                                    <option value="2">2024</option>
                                    <option value="3">2025</option>
                                    <option value="4">2026</option>
                                    <option value="5">2027</option>
                                </select>
                            </label>
                        </div>
                        <div style="margin: 0 5px; flex: 1;">
                            <label>
                                <select class="grade-chooser" id="subjectChooser" name="question">
                                    <option value="0">Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </label>
                        </div>
                    </div>



                    <div class="box balance-box">
                        <h4>Total Icome</h4>
                        <?php
                        $totalAmount = 0; // initialize total amount variable to 0
                        foreach ($data[0] as $row) {
                            $totalAmount += $row->amount; // add current row's amount to the total
                        }
                        ?>
                        <h1 class="amount"><span id="current-balance">Rs <?php echo $totalAmount ?></span></h1>
                    </div>

                    <div class="box balance-box">
                        <h4>Total Withdraw</h4>
                        <?php
                        $totalAmount = 0; // initialize total amount variable to 0
                        foreach ($data[1] as $row) {
                            $totalAmount += $row->amount; // add current row's amount to the total
                        }
                        ?>
                        <h1 class="amount"><span id="current-balance">Rs <?php echo $totalAmount ?></span></h1>
                    </div>

                    <div class="box amount-box">
                        <h4>Enter amount to withdraw</h4><br>
                        <div class="withdraw-amount">
                            <form action="<?php echo BASEURL; ?>TBilling/BillForm" method="POST">
                                <input type="number" id="withdraw-amount-input" class="withdraw-amount-input" min="0" step="1">
                                <button id="withdraw-btn" class="withdraw-btn">Withdraw</button>
                            </form>
                        </div>
                    </div>




                </div>

        </div>
    </section>
    </div>
    </section>
</body>
<script>

</script>

</html>