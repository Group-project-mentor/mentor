<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
</head>

<body>
    <section class="page">
    <?php if(!empty($_SESSION['message'])){
        switch ($_SESSION['message']){
            case "Your have successfully added the teacher":
                include_once "components/alerts/Teacher/teacher_addded.php";
                break;
            case "Your add student limit for free account is over":
                include_once "components/alerts/Teacher/addTeacherLimit.php";
                break;
        }
    } ?>
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>home">Back</a>
                    </a>
                <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Student Requests</h1>
                    <h3><?php echo "Class ID-".$_SESSION['cid']?><h3>
                    <h3><?php echo " Class Name-".ucfirst($_SESSION['cname']) ?> </h3>
                </div>
                <br><br>



                <hr style="border: 1px solid rgba(128,128,128,0.06);width: 50%;margin: auto;" />


                <section class="tab-container" style="display: flex;justify-content: center;">
                    <div class="sponsor-list-main row-decoration" id="info-table">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Student Id
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Student Name
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Date
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                Time
                            </div>
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">

                            </div>
                        </div>
                        <?php if (empty($data[0])) { ?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO STUDENTS JOIN REQUESTS
                                </div>
                            </div>
                            <?php } else {
                            foreach ($data[0] as $row) {
                                if($row->accept == 0){
                            ?>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo $row->id ?>
                                    </div>
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo $row->name ?>
                                    </div>
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo date('Y-m-d', strtotime($row->timestamp)); ?>
                                    </div>
                                    <div class="sponsor-list-item flex-1">
                                        <?php echo date('H:i', strtotime($row->timestamp)); ?>
                                    </div>
                                    <div class="sponsor-list-item flex-1">

                                        <a href="<?php echo BASEURL . 'joinRequests/acceptRequest/' . $row->rid .  "/" . $_SESSION["cid"]."/" . $row->id  ?>  style=" border: none; color: white; padding: 8px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px; "> 
                                            <button class=" button button1">Accept</button></a>

                                            <style>
                                                .button {
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 16px;
                                                    margin: 4px 2px;
                                                    cursor: pointer;
                                                    border-radius: 12px;
                                                }

                                                .button1 {
                                                    background-color: #186537
                                                }

                                                /* Green */
                                            </style>

                                            <a href="<?php echo BASEURL . 'joinRequests/deleteRequest/' . $row->rid .  "/" . $_SESSION["cid"] ?>  style=" border: none; color: white; padding: 8px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px; ">     
                                       <button class=" button button1">Delete</button></a>

                                            <style>
                                                .button {
                                                    border: none;
                                                    color: white;
                                                    padding: 8px 10px;
                                                    text-align: center;
                                                    text-decoration: none;
                                                    display: inline-block;
                                                    font-size: 16px;
                                                    margin: 4px 2px;
                                                    cursor: pointer;
                                                    border-radius: 12px;
                                                }

                                                .button1 {
                                                    background-color: #186537
                                                }

                                                /* Green */
                                            </style>
                                    </div>
                                </div>
                        <?php }}} ?>
                    </div>
                </section>


                <!-- bottom part -->
                <section class="bottom-section-grades">

                </section>

        </div>
    </section>
</body>
<script>
    let tab = document.getElementsByClassName('tp-tab');
    let tabCont = document.getElementsByClassName('tab-container');

    // ? Tab - containers handler
    for (let j = 1; j < tabCont.length; j++) {
        tabCont[j].style.display = 'none';
        tab[j].classList.remove('active');
    }

    for (let i = 0; i < tab.length; i++) {
        tab[i].onclick = () => {
            for (let j = 0; j < tabCont.length; j++) {
                if (i !== j) {
                    tabCont[j].style.display = 'none';
                    tab[j].classList.remove('active');
                }
            }
            tabCont[i].style.display = 'flex';
            tab[i].classList.add('active');
        }
    }
</script>

</html>