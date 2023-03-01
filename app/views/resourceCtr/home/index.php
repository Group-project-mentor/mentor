<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//     header("location:" . BASEURL . "login");
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Resource Creator</h1>
                    <h6>welcome <?php echo $_SESSION['name'] ?></h6>
                </div>

                <!-- bottom part -->
                <section class="bottom-section-grades">

<!--                    <div class="decorator">-->
<!--                        <img src="assets/clips/lap_man.png" alt="lap man">-->
<!--                    </div>-->
                    <div class="sponsor-student-prof">
                        <div class="bottom-details" style="margin: 10px 10px;height: 50vh;">
                            <div>
                                <div class="sp-subject-report">
                                    <h4>Resources You Can Access</h4>
                                    <!--                                    <img src="--><?php //echo BASEURL?><!--assets/clips/chart.webp" style="width: 400px;">-->
                                    <canvas id="myChart">

                                    </canvas>
                                </div>
                                <div style="display: flex;flex-direction: column;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>All Resources</h2>
                                            <h1>10</h1>
                                        </div>
                                    </div>
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>Not Approved</h2>
                                            <h1>7</h1>
                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>Approved</h2>
                                            <h1>3</h1>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="sp-subject-details">
                                <h4>Subjects involved in</h4>
                                <div class="sponsor-list-main border-no">
                                    <?php
                                    if(!empty($data[0])){
                                        foreach ($data[0] as $row){ ?>

                                            <div class="sponsor-list-row">
                                                <div class="sponsor-list-item flex-1 sponsor-grade-cell" >
                                                    <?php echo $row->name ?>
                                                </div>
                                            </div>

                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chartData = <?php echo json_encode($data[1]) ?>;
    let Data = [];
    let Labels = [];
    chartData.forEach(resource => {
        Data.push(resource.resCount);
        Labels.push(`${resource.type}s`);
    });

    // console.log(Data,Labels);
    const chart = document.getElementById('myChart');

    new Chart(chart, {
        type: 'doughnut',
        data: {
            labels: Labels,
            datasets: [{
                label: 'Number of Resources',
                data: Data,
                borderWidth: 1,
                backgroundColor:[
                    'rgb(255, 99, 12)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 5, 86)',
                    'rgb(102,197,81)',
                ]
            }]
        },
        options: {
            scales: {

            }
        }
    });
</script>
</html>
