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
        <?php include_once "components/navbars/sp_nav_1.php"?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL . 'sponsor/profile' ?>">
                        <?php include_once "components/profilePic.php"?>
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
<!--                    <h1>Sponsor</h1>-->
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
                                <div style="display: flex;flex-direction: column;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>Total Funded</h2>
                                            <h1><?php echo "Rs ". (!empty($data["totalFunded"])?
                                                        number_format($data["totalFunded"], 2, '.', ','):
                                                        "0.00") ?>
                                            </h1>
                                        </div>
                                    </div>
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card" style="min-width: 350px;">
                                            <h2>Remaining Payment</h2>
                                            <h1><?php echo "Rs ". (!empty($data["totalFunded"])?
                                                        number_format($data["remainingAmount"], 2, '.', ','):
                                                        "0.00") ?>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: flex;flex-direction: column;width: 600px;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card" style="min-width: 350px;">
                                            <h2>Monthly Average</h2>
                                            <h1><?php echo "Rs ". (!empty($data["monthlyAverage"])?
                                                        number_format($data["monthlyAverage"], 2, '.', ','):
                                                        "0.00") ?>
                                            </h1>
                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>Students</h2>
                                            <h1><?php echo !empty($data["stCount"])?$data["stCount"]:0 ?></h1>
                                        </div>

                                    </div>
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card" style="min-width: 350px;">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div>
                                <div style="display: flex;flex-direction: column;flex: 2;">
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Total Funding Student Wise</h4>
                                        <canvas id="myChart1" class="resource-chart">

                                        </canvas>
                                    </div>
                                </div>
                                <div style="display: flex;flex-direction: column;flex:1;">
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Student Monthly Amounts </h4>
                                        <canvas id="myChart2" class="resource-chart">

                                        </canvas>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div>
                                <div style="display: flex;flex-direction: column;flex: 1;">
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Total Funding Student Wise</h4>
                                        <canvas id="myChart3" class="resource-chart">

                                        </canvas>
                                    </div>
                                </div>
                                <div style="display: flex;flex-direction: column;flex:2;">
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Monthly Paid Amounts (This Year - <?php echo date('Y')?> )</h4>
                                        <canvas id="myChart4" class="resource-chart">

                                        </canvas>
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
    let totFundingChart = <?php echo json_encode($data["totalFundingChart"]) ?>;
    let monthlyChartData = <?php echo json_encode($data["monthlyChartData"]) ?>;
    let monthlyBillArray = <?php echo json_encode($data["monthlyBillArray"]) ?>;

    console.log(monthlyBillArray.keys)

    let totFundingData = {
        data : [],
        labels : []
    }
    let monthlyAmounts = {
        data : [],
        labels : []
    }
    totFundingChart.forEach(resource => {
       totFundingData.data.push(resource.total);
       totFundingData.labels.push(resource.name);
    });

    monthlyChartData.forEach(resource => {
        monthlyAmounts.data.push(resource.monthlyAmount);
        monthlyAmounts.labels.push(resource.name);
    });

    // console.log(Data,Labels);
    const chart1 = document.getElementById('myChart1');
    const chart2 = document.getElementById('myChart2');
    const chart3 = document.getElementById('myChart3');
    const chart4 = document.getElementById('myChart4');

    const labels = ["A","B","C","D","E","F","G"];
    const sampleData = [12,23,45,66,23,11,34]

    const data1 = {
        labels: totFundingData.labels,
        datasets: [{
            label : "Total agreed fund amount",
            data: totFundingData.data,
            backgroundColor: [
                'rgba(11,144,64,0.69)',
            ],
            borderColor: [
                'rgba(11,144,64,0.69)',
            ],
            borderWidth: 1
        }]
    };
    const data2 = {
        labels: monthlyAmounts.labels,
        datasets: [{
            data: monthlyAmounts.data,
            backgroundColor: [
                'rgba(99,148,255,0.2)',
                'rgba(161,255,99,0.2)',
                'rgba(255,99,135,0.2)',
                'rgba(174,99,255,0.2)',
                'rgba(255,200,99,0.2)',
            ],
            borderColor: [
                'rgb(99,143,255)',
                'rgb(58,211,5)',
                'rgb(255,99,99)',
                'rgb(150,29,252)',
                'rgb(245,106,30)',
            ],
            borderWidth: 1
        }]
    };

    const data3 = {
        labels: labels,
        datasets: [{
            label : "Total agreed fund amount",
            data: sampleData,
            backgroundColor: [
                'rgba(99,148,255,0.2)',
                'rgba(161,255,99,0.2)',
                'rgba(255,99,135,0.2)',
                'rgba(174,99,255,0.2)',
                'rgba(255,200,99,0.2)',
            ],
            borderColor: [
                'rgb(99,143,255)',
                'rgb(58,211,5)',
                'rgb(255,99,99)',
                'rgb(150,29,252)',
                'rgb(245,106,30)',
            ],
            borderWidth: 1
        }]
    };

    const data4 = {
        labels:  Object.keys(monthlyBillArray),
        datasets: [{
            label: 'Monthly Billed Totals',
            data: monthlyBillArray,
            // data: Object.entries(monthlyBillArray).filter(([key, value])=>value !== 0),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    new Chart(chart1, {
        type: 'bar',
        data: data1,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            // indexAxis: 'y',
        },
    });

    new Chart(chart2, {
        type: 'doughnut',
        data: data2,
        options: {
            scales: {
            },
        },
    });

    new Chart(chart3, {
        type: 'doughnut',
        data: data3,
        options: {
            scales: {
            },
        },
    });

    new Chart(chart4, {
        type: 'line',
        data: data4,
        options: {
            scales: {
            },
        },
    });
</script>
</html>
