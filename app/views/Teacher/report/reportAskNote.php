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
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>


            <?php
            $cid = $_SESSION["cid"];
            ?>



            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>TClassMembers/memDetails/<?php echo "$cid"; ?>"" class=" nav-link">
                    <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/participants.png" alt="home">
                    <div class="nav-link-text">Participants</div>
                    <a href="<?php echo BASEURL . 'TResources/videos/' . $_SESSION['cid'] ?>" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_resources.png" alt="home">
                        <div class="nav-link-text">Resources</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TInsideClass/addTr/<?php echo "$cid"; ?>" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/add_teacher.png" alt="home">
                        <div class="nav-link-text">Add Teacher</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TInsideClass/addSt" class="nav-link" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/add_student.png" alt="home">
                        <div class="nav-link-text">Add Student</div>
                    </a>
                    <a href="<?php echo BASEURL ?>TReport/generateReport" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/generate_report.png" alt="home">
                        <div class="nav-link-text">Generate Reports</div>
                    </a>
                    <a href="<?php echo BASEURL ?>joinRequests/getRequests/<?php echo "$cid"; ?>" class="nav-link">
                        <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/forum.png" alt="home">
                        <div class="nav-link-text">Join Requests</div>
                    </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>

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
                    <h1>Generate Reports</h1>
                    <h6>Teacher Home/ C136-member details/Generate reports</h6>

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

        <br><br>

        </div>



        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })


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