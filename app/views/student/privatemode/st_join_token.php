<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student private mode</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/Student/st_card_set.css">

    <style>
        .token {
            border-style: solid;
            border-color: #17ac06;
            border-width: 3px;
            text-align: center;
            padding: 10px 35px 10px 35px;
            width: 600px;
            margin-left: 20%;
        }
    </style>
</head>

<body>
<?php
if(!empty($_SESSION['message'])) {
     if ($_SESSION['message'] == "NOrequest") {
        $message = "You Already Enroll To this Class OR Already Send Token Request To this Class !";
        include_once "components/alerts/operationFailed.php";
    }
}
?>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_7.php" ?> <!-- used to include_once to add file -->

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL; ?>st_private_mode/st_join_classes">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL ?>st_profile">
                    <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>
            <hr style="color: green; height:7px; background-color:green;">
            <section>
                <div>
                    <br><br>
                    <h2>Join with class token</h2>
                    <h4>Get the class token from your teacher and join to the class by entering here. <br><br><br></h4>
                    <div style="padding-top: 80px; margin:auto;">
                        <h3 class="token" style="padding: 20px 20px 40px 20px;">
                            <b>Enter the token here : </b>
                            <div class="search-bar">
                                <input type="text" name="" id="token" placeholder=" Search..." style="width: 650px;">
                                <a id="token_link">
                                    <img src="<?php echo BASEURL; ?>assets/icons/icon_approved.png" alt="">
                                </a>
                            </div>
                            <hr>
                        </h3>
                    </div>
                </div>
            </section>
        </div>
    </section>
</body>
<script>
    let BASEURL = '<?php echo BASEURL ?>';

    let token = document.getElementById("token");
    let token_link = document.getElementById("token_link");
    let token_name = "";

    token.addEventListener("change", function(e) {
        token_name = e.target.value;
        if (token_name == "") {
            location.reload();
        } else {
            token_link.href = `${BASEURL}st_private_mode/st_join_token_send/${token_name}`;
        }
    });
</script>

</html>