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

        .history-btn {
            background-color: #186537;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 600px;
        }
    </style>
</head>

<body>
<?php
        if(isset($_SESSION['message']) && $_SESSION['message']== "success"){
            include_once "components/alerts/Teacher/withdraw_money.php";
        }
        elseif(isset($_SESSION['message']) && $_SESSION['message']== "failed"){
            include_once "components/alerts/Teacher/withdraw_money_failed.php";
        }
    ?>
    <section class="page">
    

        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php" ?>
        <//?php include_once "components/alerts/rightAlert.php"?>
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>
            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">

                    <h1>Billing</h1>
                    <h6>Teacher Home/ Billing</h6>
                    <br>

                    <div class="subject-heading-container" style="border-radius: 2px; display: flex; width:1100px;">
                        <div style="margin: 0 5px;  flex: 1;">
                            <label>
                                <select class="grade-chooser" id="classChooser" name="question">
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
                                <select class="grade-chooser" id="yearChooser" name="question">
                                    <option value="0">Year</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </label>
                        </div>
                        <div style="margin: 0 5px; flex: 1;">
                            <label>
                                <select class="grade-chooser" id="monthChooser" name="question">
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
                        <div style="margin: 0 5px; margin-left:5px;">
                        <button id="history-btn" class="history-btn" onclick="location.href='<?php echo BASEURL; ?>TBilling/tHistory'">Transaction History</button>

                        </div>
                    </div>



                    <div class="box balance-box" id="icome">
                        <h4>Total Icome</h4>
                        <?php
                        $totalAmount = 0;
                        $totalWithdraw = 0;
                        $remain = 0; // initialize total amount variable to 0
                        foreach ($data[0] as $row) { ?>
                        <?php $totalAmount += $row->amount; // add current row's amount to the total
                        }
                        foreach ($data[1] as $row) { ?>
                        <?php $totalWithdraw += $row->amount; // add current row's amount to the total
                        }
                        $remain = $totalAmount - $totalWithdraw ?>
                        <h1 class="amount"><span id="current-balance"><?php echo 'Rs. ' . number_format($remain, 2, '.', '') ?></span></h1>
                    </div>
                    
                    <div class="box balance-box" id="withdraw">
                        <h4>Total Withdraw</h4>
                        <?php
                        $totalAmount = 0; // initialize total amount variable to 0
                        foreach ($data[1] as $row) {
                            $totalAmount += $row->amount; // add current row's amount to the total
                        }

                        ?>
                        <h1 class="amount"><span id="current-balance"><?php echo 'Rs. ' . number_format($totalAmount, 2, '.', '') ?></span></h1>
                    </div>

                    <div class="box amount-box">
                        <h4>Enter amount to withdraw</h4><br>
                        <div class="withdraw-amount">
                            <form action="<?php echo BASEURL; ?>TBilling/BillForm" method="POST">
                                <input type="number" id="withdraw-amount-input" name="withdraw-amount-input" class="withdraw-amount-input" min="0" step="1">
                                <input type="hidden" id="withdraw-amount-hidden" name="withdraw-amount-hidden">
                                <button id="withdraw-btn" class="withdraw-btn" onclick="return validateWithdrawAmount();">Withdraw</button>
                            </form>
                        </div>
                    </div>



                </div>
            </section>
        </div>
    </section>
</body>
<script>
    function validateWithdrawAmount() {
        var amountInput = document.getElementById("withdraw-amount-input");
        var amountHidden = document.getElementById("withdraw-amount-hidden");

        if (amountInput.value === "") {
            makeError("Please enter an amount to withdraw.");
            return false;
        } else if (amountInput.value <= 0) {
            makeError("Please enter a valid amount to withdraw.");
            return false;
        } else {
            amountHidden.value = amountInput.value;
            return true;
        }
    }
    let withdrawBtn = document.getElementById("withdraw-btn");
    let withdrawAmountInput = document.getElementById("withdraw-amount-input");
    let currentBalance = document.getElementById("current-balance");

    withdrawBtn.addEventListener("click", (event) => {
        let withdrawAmount = withdrawAmountInput.value;
        let totalIncome = parseInt(currentBalance.innerText.split(" ")[1]);

        if (withdrawAmount > totalIncome & withdrawAmount != 0) {
            event.preventDefault(); // prevent form submission
            makeError("Withdraw amount cannot be greater than total income.");

        }
    });

    const BASEURL = '<?php echo BASEURL ?>';
    let classChooser = document.getElementById("classChooser");
    let yearChooser = document.getElementById("yearChooser");
    let monthChooser = document.getElementById("monthChooser");
    let income = document.getElementById("income");
    let withdraw = document.getElementById("withdraw");

    let cid = 0;
    let year = 0;
    let month = 0;

    const renderCards = () => {
        income.innerHTML = "";
        fetch(`${BASEURL}TBilling/filterIncome/${cid}/${year}/${month}`)
            .then(response => response.json())
            .then(data => {
                if (data.length !== 0) {
                    let count = 1;
                    data.forEach(item => {
                        income.innerHTML += `
                        ${totalAmount} += ${item.amount};
                    `
                    })
                } else {
                    subCardSet.innerHTML = '<div style="margin: 10px;font-size: large;">No Results</div>';
                }
            })
            .catch(err => console.log(err));
    }

    classChooser.onchange = event => {
        cid = event.target.value;
        renderCards();
    }

    yearChooser.onchange = event => {
        year = event.target.value;
        renderCards();
    }

    monthChooser.onchange = event => {
        month = event.target.value;
        renderCards();
    }
</script>

</html>