<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Billing Form</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/paymentForms.css' 
                                            ?><!-- ">-->
    <style>
        .answer-correctness-btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            align-self: flex-end;
            margin: 15px 20px;
        }

        .answer-correctness-btn>label {
            margin-left: 5px;
        }

        .answer-correctness-btn>button {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(98, 97, 97, 0.071);
            padding: 5px 8px;
            font-size: smaller;
            color: rgb(182, 0, 0);
            border-radius: 7px;
            cursor: pointer;
            border: none;
        }

        #save-info-check {
            accent-color: green;
            margin-left: 25px;
            block-size: 30px;
            inline-size: 15px;
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
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>TBilling/Billing1">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>sponsor/profile">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Payments Details</h1>
                    <h6> Billing / Payments Details</h6>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box" style="margin-top:10px; ">
                    <!--                <div style="margin-top: 20px;display: flex;justify-content: space-between;">-->
                    <!--                    <div class="rc-resource-header">-->
                    <!--                        <h3>Pay your remaining payment :  </h3>-->
                    <!--                    </div>-->
                    <!--                    <a href="--><?php //echo BASEURL
                                                        ?><!--sponsor/transactionHistory" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">-->
                    <!--                        <img src="--><?php //echo BASEURL
                                                                ?><!--public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">-->
                    <!--                        Transaction History-->
                    <!--                    </a>-->
                    <!--                </div>-->
                    <div class="rc-upload-box">
                        
                <?php $withdrawAmount = $_POST["withdraw-amount-hidden"];
;
?>

                    <form action="<?php echo BASEURL; ?>TBilling/addWithdraws/<?php echo $withdrawAmount; ?>" method="POST" class="rc-upload-form" id="paymentForm">

                            
                            <div class="rc-form-group-hz">
                                <div class="rc-form-group" style="flex: 1;">
                                    <label>Bank Name :</label>
                                    <select class="pp-quiz-chooser" name="bankName">
                                        <option value="" disabled selected>Select a bank</option>
                                        <option value="SBank of Ceylon">Bank of Ceylon</option>
                                        <option value="Commercial Bank PLC">Commercial Bank PLC</option>
                                        <option value="DFCC Bank PLC">DFCC Bank PLC</option>
                                        <option value="Hatton National Bank PLC">Hatton National Bank PLC</option>
                                        <option value="HNB Bank PLC">HNB Bank PLC</option>
                                        <option value="LB Finance PLC">LB Finance PLC</option>
                                        <option value="National Savings Bank">National Savings Bank</option>
                                        <option value="Peoples Bank">Peoples Bank</option>
                                        <option value="Regional development Bank">Regional development Bank</option>
                                        <option value="Sampath Bank">Sampath Bank</option>
                                        <option value="Selan Bank">Selan Bank</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="hidden_field_name" value="some_value">

                            <div class="rc-form-group">
                                <label> Account Number : </label>
                                <input type="text" name="number" placeholder="Account Number">
                            </div>
                            <div class="rc-form-group">
                                <label> Account Name : </label>
                                <input type="text" name="name" placeholder="Account Name" />
                            </div>
                            <div class="rc-form-group-hz">
                                <div class="rc-form-group" style="flex: 1;">
                                    <label> Country : </label>
                                    <label>
                                        <select class="pp-quiz-chooser" name="country">
                                            <option value="Sri Lanka" selected>Sri Lanka</option>
                                        </select>
                                    </label>
                                </div>
                                <!--                            <div class="rc-form-group" style="flex: 1;">-->
                                <!--                                <label> Currency* : </label>-->
                                <!--                                <label>-->
                                <!--                                    <select class="pp-quiz-chooser" name="currency">-->
                                <!--                                        <option value="LKR" selected>LKR</option>-->
                                <!--                                        <option value="USD">USD</option>-->
                                <!--                                    </select>-->
                                <!--                                </label>-->
                                <!--                            </div>-->
                            </div>

                            <div class="rc-upload-button">
                                <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">Withdraw</button>
                            </div>

                        </form>
                    </div>
                </div>
        </div>
    </section>
</body>


</script>

</html>