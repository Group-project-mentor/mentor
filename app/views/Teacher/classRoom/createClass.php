<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher class</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
<?php
        if(isset($_SESSION['message']) && $_SESSION['message']== "success"){
            include_once "components/alerts/Teacher/classCreated.php";
        }
        elseif(isset($_SESSION['message']) && $_SESSION['message']== "failed"){
            include_once "components/alerts/Teacher/classFailed.php";
        }
        elseif(isset($_SESSION['message']) && $_SESSION['message']== "premiumLimited"){
            include_once "components/alerts/Teacher/premiumOver.php";
        }
    ?>

    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_1.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>home">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <?php include_once "components/premiumIcon.php" ?>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Create Class</h1>
                    <h6>Teacher Home/ Create Class</h6>
                    <br><br><br>
                    <h3>Enter class name</h3>
                </div>



                <div class="class section">
                    <form action="<?php echo BASEURL; ?>TClassRoom/createAction" method="POST">
                        <label for="class_name"></label>
                        <input type="text" id="class_name" name="class_name" placeholder="New class name..">
                        <h3>Currency Name</h3>
                        <label for="currency_name"></label>
                        <select id="currency_name" name="currency_name">
                            <option value="" disabled selected>Select a Currency</option>
                            <option value="LKR">LKR</option>
                        </select>
                        <h3>Monthly Class Fees</h3>
                        <label for="class_fees"></label>
                        <input type="text" id="class_fees" name="class_fees" placeholder="0.00">
                        <input type="submit" value="create" id="create">
                    </form>
                </div>


            </section>

            <!-- bottom part -->
            <section class="Teacher-class-bottom">
                <div class="Teacher-decorator">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/lap_man.png" alt="lap man">
                </div>
            </section>



        </div>
    </section>
</body>
<script>
    function checkClassName() {
        document.getElementById("create").addEventListener("click", function(event) {
            var feedback = document.getElementById("class_name").value;
            if (feedback.trim() === '') {
                alert("Please enter Class Name.");
                event.preventDefault(); // stop form submission
            }

            var currency = document.getElementById("currency_name").value;
            if (currency.trim() === '') {
                alert("Please select a currency.");
                event.preventDefault(); // stop form submission
            }

            var fees = document.getElementById("class_fees").value;
            if (fees.trim() === '') {
                alert("Please Enter fees.");
                event.preventDefault(); // stop form submission
            }
        });
    }

    window.addEventListener("load", checkClassName);
</script>

</html>