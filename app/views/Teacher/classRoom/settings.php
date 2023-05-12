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
        button {
            background-color: #186537;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] == "success") {
        include_once "components/alerts/Teacher/withdraw_money.php";
    } elseif (isset($_SESSION['message']) && $_SESSION['message'] == "failed") {
        include_once "components/alerts/Teacher/withdraw_money_failed.php";
    }
    ?>
    <section class="page">


        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>
        </ /?php include_once "components/alerts/rightAlert.php" ?>
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
                    <div class="mid-title">
                        <h1>Settings</h1>
                        <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                                <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                                <br>
                    </div>


                    <div>
                        <br><br>
                        <h3>This is the class Token:</h3>
                        <input type="text" id="class-link" value="<?php echo $data[0]->token; ?>">
                        <button onclick="copyLink()">Copy Link</button>
                    </div>



                </div>
            </section>
        </div>
    </section>
</body>

<script>
    function copyLink() {
        /* Get the text field */
        var copyText = document.getElementById("class-link");

        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the class link: " + copyText.value);
    }
</script>

</html>