<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher create report 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>TInsideClass/InClass">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Generate Reports</h1>
                    <h6>Teacher Home/ C136-member details/Generate reports</h6>
                    <br><br>
                </div>

                <div class="text-center" style="padding:20px; display: flex; justify-content: center;">
                    <button onclick="generatePDF()" style="background-color: #186537; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Generate</button>
                </div>

                <div class="container_content" id="container_content">
                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Quiz ID
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Marks
                                </div>
                            </div>
                            <?php if (!empty($data[0])) { ?>
                                <div class="sponsor-list-row">
                                </div>
                                <?php foreach ($data[0] as $row) {

                                ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->quiz_id ?>
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->marks ?>
                                        </div>
                                    </div>
                                <?php } ?>


                            <?php }  ?>
                        </div>
                        <br><br>
                        <div class="sponsor-student-prof">
                            <div class="bottom-details" style="margin: 10px 10px;height: 50vh;">
                                <div>
                                    <div class="sp-subject-report resource-chart">
                                        <h4>Quizz Marks Analyse</h4>
                                        <canvas id="myChart1" class="resource-chart">

                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


        </div>

        <br><br>

        </div>



        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    let chartData = <?php echo json_encode($data[0]) ?>;
    let Data = [];
    let Labels = [];
    chartData.forEach(resource => {
        Data.push(resource.marks);
        Labels.push(`Quizz-${resource.quiz_id}`);
    });

    // console.log(Data,Labels);
    const chart = document.getElementById('myChart1');

    new Chart(chart, {
        type: 'line',
        data: {
            labels: Labels,
            datasets: [{
                label: 'Marks',
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

    function generatePDF() {
        const element = document.getElementById('container_content');
        var opt = {
            margin: 0.5,
            filename: 'Report.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        // Choose the element that our invoice is rendered in.
        html2pdf().set(opt).from(element).save();
    }
</script>

</html>