<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher create report 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>
<style>
    #list-view {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #list-view li {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        background-color: white;
        cursor: pointer;
    }

    #list-view li:last-child {
        border-bottom: none;
    }

    #list-view li span {
        margin-right: 10px;
    }

    #list-view li:hover {
        background-color: #c5c5c5;
    }



    @media only screen and (max-width: 600px) {
        #list-view li {
            flex-direction: column;
            align-items: flex-start;
        }

        #list-view li span {
            margin-right: 0;
            margin-bottom: 5px;
        }
    }
</style>

<body>

    <?php
    $category = "documents";
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/reportUploadSucess.php";
        }
    }
    ?>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

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
                    <h1>Generate Reports</h1>
                    <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                            <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                            <br><br><br>
                            <h3>Enter Student Name</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TReport/AskFeedback/<?php echo "$cid"; ?>" method="POST">
                        <label for="student_name"></label>
                        <input type="text" id="student_name" name="student_name" placeholder="New student Name..">
                        <h3>Student ID</h3>
                        <label for="class_name"></label>
                        <input type="text" id="student_id" name="student_id" placeholder="Student ID..">
                        <br>
                        <ul id="list-view">

                        </ul>
                        <h3>Report Category</h3>
                        <label for="report_category"></label>
                        <select id="report_category" name="report_category">
                            <option value="" disabled selected>Select Quiz amount</option>
                            <option value="1">Analyse last 5 quizzes</option>
                            <option value="2">Analyse last 10 quizzes</option>
                            <option value="3">Analyse last 15 quizzes</option>
                            <option value="4">Analyse last 20 quizzes</option>
                        </select>
                        <input type="submit" value="Add">
                        <!--<input type="submit" value="Next">-->
                    </form>
                </div>

            </section>

            <!-- bottom part -->
            <section class="Generate_reports-class-bottom">
                <div class="Generate_reports-decorator">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/report.png" alt="issue man">
                </div>
            </section>



        </div>
    </section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
    let nameInput = document.getElementById('student_name');
    let student_id = document.getElementById('student_id');
    let listView = document.getElementById('list-view');


    function renderList(id, name) {
        return `
                <li onclick='selectItem(${id},"${name}")'>
                    ${id} - ${name}
                </li>
        `;
    }



    nameInput.addEventListener('keyup', (element) => {
        let stName = element.target.value;
        let htmlTxt = "";
        if (stName !== "") {
            fetch(`${BASEURL}TInsideClass/getStudentReportSearch/${stName}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data.length);
                    for (let i = 0; i < data.length; i++) {
                        htmlTxt += renderList(data[i].id, data[i].name);
                        // console.log(htmlTxt);
                    }
                    listView.innerHTML = htmlTxt;
                })
                .catch(err => {
                    console.log(err);
                })
        } else {
            listView.innerHTML = htmlTxt;
        }
    });

    function selectItem(id, name) {
        student_id.value = id;
        nameInput.value = name;
        listView.innerHTML = ''; // clear the list
        listView.style.display = 'none'; // hide the list
    }
</script>

</html>