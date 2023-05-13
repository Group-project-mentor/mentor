<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_dashboard.css">
    <style>
        .graph-box_large {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            padding: 20px;
            width: 1200px;
            height: 600px;
            margin-left: 40px;
            margin-top: 30px;
            border-radius: 20px;
            margin-right: 40px;
        }



       
    </style>


</head>
<nav>
    <div class="ad_nav">

    </div>
</nav>

<body>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>

    <section class="mid-content ad_mid-content"><!-- Middle part for whole content -->
        <div class="ad_section1">
            <div class="graph-box_large style=" display: flex;flex-direction: column;flex:2;">
                <h4>Monthly New Join Users (This Year - <?php echo date('Y') ?> )</h4>
                <canvas id="myChart1" class="resource-chart">
            </div>
        </div>
     



        </div>
    </section>
    <style>
        .tab {
            padding: 5px 10px;
        }
    </style>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>

    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let studentChart = <?php echo json_encode($data["monthlyStArray"]) ?>;
    let teacherChart = <?php echo json_encode($data["monthlytArray"]) ?>;
    let rcChart = <?php echo json_encode($data["monthlyRcArray"]) ?>;
    let sponsorChart = <?php echo json_encode($data["monthlySpArray"]) ?>;

    console.log(studentChart);

    const chart = document.getElementById('myChart1');
    const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    const chartData = {
        labels: labels,
        datasets: [{
            label: 'Student',
            data: studentChart.month,
            backgroundColor: 'rgba(255, 99, 132, 1)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }, {
            label: 'Teacher',
            data: teacherChart.month,
            backgroundColor: 'rgba(54, 162, 235, 1)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }, {
            label: 'Resource Creators',
            data: rcChart.month,
            backgroundColor: 'rgba(255, 206, 86, 1)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }, {
            label: 'Sponsors',
            data: sponsorChart.month,
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    new Chart(chart, {
        type: 'bar',
        data: chartData,
        options: {
            scales: {
                x: {
                    offset: true,
                    ticks: {
                        beginAtZero: true
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>



<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    // let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            // navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            // navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })

    const profileBtn = document.getElementById("profile-btn");
    const popupMenu = document.getElementById("popup-menu")
    let toggler = false;

    profileBtn.addEventListener('click', () => {
        if (toggler) {
            popupMenu.style.display = "none";
            toggler = false

        } else {
            popupMenu.style.display = "flex";
            toggler = true
        }
    });
</script>