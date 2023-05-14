<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher 1</title>
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

    .teacher-form-content{
            display: flex;
            flex-direction: column;
            margin: auto;
            min-width: 300px !important;
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

<body style="overflow-x: hidden;">
    <?php include_once "components/alerts/rightAlert.php" ?>

    <section class="page">

        <?php
        if (isset($_SESSION['message']) && $_SESSION['message'] == "success") {
            include_once "components/alerts/Teacher/teacher_added.php";
        } elseif (isset($_SESSION['message']) && $_SESSION['message'] == "failed") {
            include_once "components/alerts/Teacher/teacher_added_failed.php";
        } elseif (isset($_SESSION['message']) && $_SESSION['message'] == "premiumLimited") {
            include_once "components/alerts/Teacher/TpremiumOver.php";
        } elseif (isset($_SESSION['message']) && $_SESSION['message'] == "already") {
            include_once "components/alerts/Teacher/Talready.php";
        } elseif (isset($_SESSION['message']) && $_SESSION['message'] == "invalid") {
            include_once "components/alerts/Teacher/invalid.php";
        }
        ?>

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
                    <h1>Add Teacher</h1>
                    <h3><?php echo "Class ID-" . $_SESSION['cid'] ?><h3>
                            <h3><?php echo " Class Name-" . ucfirst($_SESSION['cname']) ?> </h3>
                            <br><br>
                            <br>
                        </div>
                <div class="teacher-form-content">
                <h3>Teacher name</h3>
                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TInsideClass/addTchAction/<?php echo "$cid"; ?>" method="POST" onsubmit="return validateForm()">
                        <label for="teacher_name"></label>
                        <input type="text" id="teacher_name" name="teacher_name" placeholder="New teacher name..">
                        <h3>Teacher Id</h3>
                        <label for="teacher_id"></label>
                        <input type="text" id="teacher_id" name="teacher_id" placeholder="New teacher id..">
                        <br>
                        <ul id="list-view">

                        </ul>
                        <h3>Teacher Privilege</h3>
                        <label for="teacher_privilege"></label>
                        <select id="teacher_privilege" name="teacher_privilege">
                            <option value="" disabled selected>Select a Privilege</option>
                            <option value="1">Only add students</option>
                            <option value="2">Only add, restrict and delete students</option>
                        </select>
                        <input type="submit" value="Add" id="Add" style="background-color: #186537;">

                    </form>
                </div>
                <section class="Teacher-class-bottom">
                    <div class="Teacher-decorator">
                        <img style="margin:auto;" src="<?php echo BASEURL ?>public/assets/Teacher/clips/add teacher.png" alt="issue man">
                    </div>
                </section>
                </div>


            </section>

            <!-- bottom part -->



        </div>
    </section>
</body>
<script>
    function validateForm() {
        var teacherNameInput = document.querySelector('#teacher_name');
        var teacherIdInput = document.querySelector('#teacher_id');
        var teacherPrivilegeSelect = document.querySelector('#teacher_privilege');

        if (teacherNameInput.value === '') {
            // alert('Please enter a valid teacher name');
            makeError("Please enter a valid teacher name");
            return false;
        }

        if (teacherIdInput.value === '') {
            // alert('Please enter a valid teacher ID');
            makeError("Please enter a valid teacher ID");
            return false;
        }

        if (teacherPrivilegeSelect.value === '') {
            // alert('Please select a teacher privilege level');
            makeError('Please select a teacher privilege level');
            return false;
        }

        return true;
    }

    const BASEURL = '<?php echo BASEURL ?>';



    let nameInput = document.getElementById('teacher_name');
    let student_id = document.getElementById('teacher_id');
    let listView = document.getElementById('list-view');


    function renderList(id, name) {
        return `
                <li onclick='selectItem(${id},"${name}")'>
                    ${id} - ${name}
                </li>
        `;
    }



    nameInput.addEventListener('keyup', (element) => {
        let tName = element.target.value;
        let htmlTxt = "";
        if (tName !== "") {
            fetch(`${BASEURL}TInsideClass/getTeacherSearch/${tName}`)
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
        teacher_id.value = id;
        nameInput.value = name;
        listView.innerHTML = ''; // clear the list
        listView.style.display = 'none'; // hide the list

    }
</script>

</html>