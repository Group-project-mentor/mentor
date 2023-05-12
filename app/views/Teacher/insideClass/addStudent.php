<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
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

</head>

<body>

    <?php
    if (!empty($_SESSION['message'])) {
        if ($_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/student_add.php";
        } elseif ($_SESSION['message'] == "failed") {
            include_once "components/alerts/Teacher/student_add_failed.php";
        } elseif ($_SESSION['message'] == "already") {
            include_once "components/alerts/Teacher/already.php";
        } elseif ($_SESSION['message'] == "duplicate") {
            include_once "components/alerts/Teacher/duplicateST.php";
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
                    <h1>Add Student</h1>
                    <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                            <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                            <br><br><br>
                            <h3>Student Name</h3>
                </div>

                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TInsideClass/createAction" method="POST">
                        <label for="student_name"></label>
                        <input type="text" id="student_name" name="student_name" placeholder="New student Name..">
                        <h3>Student ID</h3>
                        <label for="student_id"></label>
                        <input type="text" id="student_id" name="student_id" placeholder="New student ID..">
                        <input type="submit" value="Request to join" id="Request to join">
                    </form>

                    <ul id="list-view">

                    </ul>
                </div>

                <div class="mid-title">

                    <br>

                </div>



            </section>





        </div>
    </section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';

    function checkClassName() {
        document.getElementById("Request to join").addEventListener("click", function(event) {
            var name = document.getElementById("student_name").value;
            if (name.trim() === '') {
                alert("Please enter Student Name.");
                event.preventDefault(); // stop form submission
            }

            var sid = document.getElementById("student_id").value;
            if (sid.trim() === '') {
                alert("Please enter Student ID.");
                event.preventDefault(); // stop form submission
            }
        });
    }

    window.addEventListener("load", checkClassName);

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
            fetch(`${BASEURL}TInsideClass/getStudentSearch/${stName}`)
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
    }




    //function showMatchingNames(str) {
    //if (str.length == 0) {
    // document.getElementById("matching_names").innerHTML = "";
    //return;
    //} else {
    // create XMLHttpRequest object
    //var xmlhttp = new XMLHttpRequest();
    //xmlhttp.onreadystatechange = function() {
    // if (this.readyState == 4 && this.status == 200) {
    // display matching names as dropdown list
    //var names = this.responseText.split(",");
    //    var list = "<ul>";
    //     for (var i = 0; i < names.length; i++) {
    //        list += "<li onclick='selectName(\"" + names[i] + "\")'>" + names[i] + "</li>";
    //     }
    //     list += "</ul>";
    //document.getElementById("matching_names").innerHTML = list;
    //}
    //};
    //xmlhttp.open("GET", "/TInsideClass/getStudentSearch?search=" + str, true);
    //xmlhttp.send();
    //}
    // }

    // function to select name from the list and populate input field
    //function selectName(name) {
    //  document.getElementById("search").value = name;
    //document.getElementById("matching_names").innerHTML = "";
    //}
</script>

</html>