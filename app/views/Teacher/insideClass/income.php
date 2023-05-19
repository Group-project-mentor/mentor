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
    <title>Analytics</title>

    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_main.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
    <section class="page">
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
                    <!--                    <h1>Sponsor</h1>-->
                    <!-- Title and sub title of middle part -->
                    <div class="mid-title">
                        <h1>Analytics</h1>
                        <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                                <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>

                    </div>
                </div>

                <!-- bottom part -->
                <section class="bottom-section-grades">

                    <!--                    <div class="decorator">-->
                    <!--                        <img src="assets/clips/lap_man.png" alt="lap man">-->
                    <!--                    </div>-->
                    <div class="sponsor-student-prof">
                        <div class="bottom-details" style="margin: 0px 10px;height: 25vh;">
                            <div>
                                <div style="display: flex;flex-direction: column;width: 1200px; margin: top 20px;">
                                    <div class="rc-dash-info-card-set">
                                        <div class="rc-dash-info-card">
                                            <h2>Total Students</h2>
                                            <h1><?php echo $data[1]->count ?></h1>

                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>Total Co-Teachers</h2>
                                            <h1><?php echo $data[2]->count ?></h1>

                                        </div>
                                        <div class="rc-dash-info-card">
                                            <h2>This Month Income</h2>
                                            <?php if (isset($data[0]->amount)) {
                                                $money = $data[0]->amount;
                                                echo '<h1>' . 'Rs. ' . number_format($money, 2, '.', '') . '</h1>';
                                            } else {
                                                echo '<h1>' . 'Rs. 0.00' . '</h1>';
                                            }
                                            ?>
                                        </div>



                                    </div>

                                </div>

                            </div>

                            <div>
                                <div style="display: flex;flex-direction: column;flex: 2;">

                                </div>


                            </div>

                            <div>

                                <div style="display: flex;flex-direction: column;flex:2;">
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Monthly Income (This Year - <?php echo date('Y') ?> )</h4>
                                        <canvas id="myChart1" class="resource-chart">

                                        </canvas>
                                    </div>
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
    let chartData = <?php echo json_encode($data["monthlyBillArray"]) ?>;
    let data = [];
    let labels = [];


    for (let month in chartData) {
    data.push(chartData[month]);
    labels.push(month);
}

    console.log(data, labels);
    const chart = document.getElementById('myChart1');

    const data1 = {
        labels: labels,
        datasets: [{
            label: 'Monthly Income Totals',
            data: data,
            // data: Object.entries(monthlyBillArray).filter(([key, value])=>value !== 0),
            borderWidth: 1,
            backgroundColor: [
                '#FF630C',
                '#36A2EB',
                '#FFCD56',
                '#FF0556',
                '#66C551',
            ]

        }]
    }

    new Chart(chart, {
        type: 'line',
        data: data1,
        options: {
            scales: {},
        },
    });
</script>

</html>