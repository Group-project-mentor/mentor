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

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

        .container {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-top: 20px;
        }

        #selection {
            background-color: white;
            border-radius: 5px 5px 0 0;
            padding: 10px 20px;
            color: #444444;
            width: 100%;
            border-color: #00000026;
            font-size: medium;
            outline: none;
        }

        #selection>option {
            background-color: white;
            color: #444444;
            height: 20px;
            padding: 10px 20px;
            color: black;
            width: 100%;
        }

        #selection>option:hover {
            background-color: black;
        }

        button {
            cursor: pointer;
            background-color: #186537;
            padding: 5px 15px;
            border: none;
            color: white;
            border-radius: 5px;
            margin: 20px 10px 0;
            padding: 10px 20px;
            width: 100%;
        }

        .report-title {
            margin-top: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #444444;
            font-size: x-large;
        }

        select:hover,
        select:active,
        select:focus {
            background-color: #e6e6e6;
            border: 1px solid #848484;
        }
    </style>
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
                        <a class="back-btn" href="<?php echo BASEURL ?>TReport/generateReport">Back</a>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Add Feedback</h1>
                    <h6><?php echo $_SESSION['cid']."-".ucfirst($_SESSION['cname'])."/Generate Feedback/Ask Feedback"?><h6>

                </div>
                <?php
                $sid = $_SESSION["sid"];
                $Rcategory = $_SESSION['Rcategory'];
                ?>

                <form action="<?php echo BASEURL; ?>TReport/ReportRequest/<?php echo "$cid"; ?>/<?php echo "$sid"; ?>/<?php echo "$Rcategory"; ?>" method="GET">

                    <!-- bottom part -->
                    <h1 class="report-title">Enter Feedback Description</h1>
                    <div class="container">
                        <textarea name="feedback" id="feedback" cols="30" rows="10"></textarea>
                        <div style="display: flex;">
                            <button type="submit" id="form2-next">Preview</button>
                        </div>
                    </div>
                </form>

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
</script>
<script>
    function checkFeedback() {
        document.getElementById("form2-next").addEventListener("click", function(event) {
            var feedback = document.getElementById("feedback").value;
            if (feedback.trim() === '') {
                alert("Please enter feedback before generating the report.");
                event.preventDefault(); // stop form submission
            }
        });
    }

    window.onload = checkFeedback;
</script>



</html>