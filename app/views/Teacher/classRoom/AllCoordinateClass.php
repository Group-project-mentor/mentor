<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Coordinate Classes</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>


    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    
                    <a href="">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>



            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-down-title">
                    <br><br>
                    <h3>All Coordinate classes</h3>
                </div>

                <!-- subject cards -->
                <div class="container-box">


                    <?php if (!empty($data[0])) {
                        $count = 1
                    ?>

                        <div class="subject-card-set">
                            <?php foreach ($data[0] as $row) { ?>
                                <div class="subject-card">
                                <a href='<?php echo BASEURL   . "TPrivileges/pMemberDetails/". $row->cid . "/" . $row->cname  ?>'>
                                        <img alt='' src="<?php echo BASEURL . "public/assets/Teacher/patterns/" . $count++ . '.png' ?>" />
                                    </a>
                                    <a href="#"><label><?php echo $row->cid ?></label></a>
                                    <a href="#"><label><?php echo $row->cname ?></label></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php
                    } else {
                    ?>
                        <br><br>
                        <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                            <?php echo "You are not assigned as a Co-Teacher of another class yet !"; ?>
                        </h2>
                    <?php
                    }

                    ?>

                </div>

            </section>
        </div>

    </section>
</body>
<script>
 
</script>

</html>