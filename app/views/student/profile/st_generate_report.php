<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate reports</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <style>
        .resource-chart {
            max-width: 400px;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_profile">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'st_Profile' ?>">
                        <?php include_once "components/profilePic.php" ?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Hello <?php echo $_SESSION['name'] ?> !</h2>
                </div>

                <!-- bottom part -->
                <section class="bottom-section-grades">
                    <div class="sponsor-student-prof">
                        <div class="bottom-details" style="margin: 10px 10px;height: 50vh;">
                            <h2>Your Public Resources</h2>
                            <div>
                                <div class="sp-subject-report resource-chart">
                                    <h4>All Public Resources</h4>
                                    <canvas id="myChart1" class="resource-chart">

                                    </canvas>
                                </div>

                                <div style="display: flex;flex-direction: column;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card" style="background-color: green; color:white;">
                                            <h2>Your Public Resources</h2>
                                            <h1></h1>
                                        </div>
                                    </div>
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>No of Subjects Enrolled</h2>
                                            <h1><?php echo $data[3]->c  ?></h1>
                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>No of Public Quizzes Enrolled</h2>
                                            <h1><?php echo $data[4]->c  ?></h1>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="bottom-details" style="margin: 10px 10px;height: 50vh; padding-top: 175px;">
                            <h2>Your Private Classes</h2>
                            <div>
                                <!-- <div class="sp-subject-report resource-chart">
                                    <h4>Your Private Quiz Results</h4>
                                    <canvas id="myChart2" class="resource-chart">
                                    </canvas>
                                </div> -->

                                <div style="display: flex;flex-direction: column;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card" style="background-color: green; color:white;">
                                            <h2>Your Private Resources</h2>
                                            <h1></h1>
                                        </div>
                                    </div>
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>Joined Private Classes</h2>
                                            <h1><?php echo $data[0]->c ?></h1>
                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>Pending Private Classes</h2>
                                            <h1><?php echo $data[1]->c ?></h1>
                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>Teacher Class Requests</h2>
                                            <h1><?php echo $data[2]->c ?></h1>
                                        </div>
                                        <a href="" style="text-decoration: none; color:black;">
                                            <div class="rc-dash-info-card">
                                                <h2>View Classwise Teacher Uploaded Reports</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </section>
            </section>

        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let chartData = <?php echo json_encode($data[5]) ?>;
    let Data = [];
    let Labels = [];

    console.log(chartData);

    chartData.forEach(resource => {
        Data.push(resource.c);
        Labels.push(`${resource.type}s`);
    });

    // console.log(Data, Labels); myChart2
    const chart = document.getElementById('myChart1');
    const chart2 = document.getElementById('myChart2');

    new Chart(chart, {
        type: 'doughnut',
        data: {
            labels: Labels,
            datasets: [{
                label: 'Number of Resources',
                data: Data,
                borderWidth: 1,
                backgroundColor: [
                    'rgb(255, 99, 12)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 5, 86)',
                    'rgb(102,197,81)',
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {

            }
        }
    });

    new Chart(chart2, {
        type: 'doughnut',
        data: {
            labels: Labels,
            datasets: [{
                label: 'Number of Resources',
                data: Data,
                borderWidth: 1,
                backgroundColor: [
                    'rgb(255, 99, 12)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(255, 5, 86)',
                    'rgb(102,197,81)',
                ]
            }]
        },
        options: {
            responsive: true,
            scales: {

            }
        }
    });
</script>

</html>