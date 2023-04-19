
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments Details</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
<!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/paymentForms.css' ?><!-- ">-->

</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
            </div>
            <div class="top-bar-btns">
                <a onclick="history.back()">
                    <div class="back-btn">Back</div>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Payments Details</h1>
                <h6> <?php echo $_SESSION['name']?> / Payments Details</h6>
            </div>

            <!-- Grade choosing interface -->
                <div class="rc-upload-box">
                <?php if(empty($data[0])){
                    ?>
                    <form action="<?php echo BASEURL?>sponsor/details/add" method="POST" class="rc-upload-form">
                <?php } else {
                    ?>
                    <form action="<?php echo BASEURL?>sponsor/details/update" method="POST" class="rc-upload-form">
                <?php } ?>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> First Name* : </label>
                                <input type="text" name="fName" placeholder="First Name" value="<?php echo empty($data[0])?"":$data[0]->firstName ?>"/>
                            </div>
                            <div class="rc-form-group">
                                <label> Last Name* : </label>
                                <input type="text" name="lName" placeholder="Last Name" value="<?php echo empty($data[0])?"":$data[0]->lastName ?>"/>
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Payment Email* : </label>
                            <input type="text" name="email" placeholder="Email" value="<?php echo empty($data[0])?"":$data[0]->payEmail ?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Telephone* : </label>
                            <input type="text" name="telNo" placeholder="Telephone" value="<?php echo empty($data[0])?"":$data[0]->payPhone  ?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label> Address* : </label>
                            <input type="text" name="address" placeholder="Address" value="<?php echo empty($data[0])?"":$data[0]->address ?>"/>
                        </div>
                        <div class="rc-form-group">
                            <label> City* : </label>
                            <input type="text" name="city" placeholder="City" value="<?php echo empty($data[0])?"":$data[0]->city ?>"/>
                        </div>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group" style="flex: 1;">
                                <label> Country* : </label>
                                <label>
                                    <select class="pp-quiz-chooser"  name="country">
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="India">India</option>
                                    </select>
                                </label>
                            </div>
                            <div class="rc-form-group" style="flex: 1;">
                                <label> Currency* : </label>
                                <label>
                                    <select class="pp-quiz-chooser" name="currency">
                                        <option value="LKR">LKR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">
                                Save
                            </button>
                        </div>
                        <div class="rc-upload-home-title">
                            You should provide these details before doing payments
                        </div>
                    </form>
                </div>
            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL?>';
</script>
</html>