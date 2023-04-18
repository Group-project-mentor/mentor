<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Report issue</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

        .container{
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-top: 20px;
        }

        #selection{
            background-color: white;
            border-radius: 5px 5px 0 0 ;
            padding: 10px 20px;
            color: #444444;
            width: 100%;
            border-color:#00000026;
            font-size: medium;
            outline: none;
        }

        #selection > option{
            background-color: white;
            color: #444444;
            height: 20px;
            padding: 10px 20px;
            color: black;
            width: 100%;
        }

        #selection > option:hover{
            background-color: black;
        }

        button{
            cursor: pointer;
            background-color: green;
            padding: 5px 15px;
            border: none;
            color: white;
            border-radius: 5px;
            margin: 20px 10px 0;
            padding: 10px 20px;
            width: 100%;
        }

        .report-title{
            margin-top: 20px;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #444444;
            font-size: x-large;
        }

        select:hover, select:active, select:focus {
            background-color: #e6e6e6;
            border:1px solid #848484;
        }

        .inbuilt-success-msg{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .inbuilt-success-msg img{
            width: 10%;
            margin: 50px;
        }

        .inbuilt-success-msg h1{
            font-size: x-large;
            font-family: "poppins";
        }

        .inbuilt-success-msg button{
            margin: 50px;
            width: 25%;
            font-size: larger;
        }

    </style>
</head>

<body style="overflow-x: hidden;">
    <section class="page">
         <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <?php include_once "components/alerts/rightAlert.php"?>


        <!-- Right side container -->
        <div class="content-area">
            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL . 'rcProfile' ?>">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>


            <form class="mid-content" id="form-1">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Report Issue</h1>
                </div>
                <!-- bottom part -->
                <h1 class="report-title">Select Report Type</h1>

                    <div class="container">
                        <select name="reportOptions" id="selection">
                            <option value="0" selected disabled>Choose a type</option>
                            <?php foreach ($data[0] as $row){ ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                            <?php } ?>
                        </select>
                        <div style="display: flex;">
                            <button type="button" id="form1-next">
                                Next
                            </button>
                        </div>
                    </div>
            </form>

            <!-- Middle part for whole content -->
            <form class="mid-content" id="form-2">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Report Issue</h1>
                </div>
                <!-- bottom part -->
                <h1 class="report-title">Enter Report Description</h1>

                    <div class="container">
                        <textarea name="reportDesc" id="" cols="30" rows="10"></textarea>
                        <div style="display: flex;">
                            <button type="button" id="form2-back">
                                Back
                            </button>
                            <button type="submit">
                                Report
                            </button>
                        </div>
                    </div>
            </form>

            <!-- Middle part for whole content -->
            <section class="mid-content" id="success-msg" style="display: none;">
                <div class="inbuilt-success-msg">
                    <img src="<?php echo BASEURL ?>/public/assets/icons/big-icon-success.png" alt="jj">
                    <h1>Successfully Reported the Issue</h1>
                    <button type="button" onclick="location.reload();">OK</button>
                </div>
                <div id="jjj"></div>
            </section>
    </section>
</body>
<script>
    const form1 = document.getElementById('form-1');
    const form2 = document.getElementById('form-2');
    let mainForm = new FormData();

    form2.style.display = "none";

    document.getElementById('form1-next').addEventListener('click',()=>{
        let form1Data = new FormData(form1);
        for (let [key, value] of form1Data.entries()) {
            mainForm.append(key, value);
        }
        form1.style.display = "none";
        form2.style.display = "flex";

    });

    form2.addEventListener('submit',(e)=>{
        e.preventDefault();
        let form2Data = new FormData(form2);
        for (let [key, value] of form2Data.entries()) {
            mainForm.append(key, value);
        }
        form1.style.display = "none";
        form2.style.display = "none";

        fetch('<?php echo BASEURL?>rcProfile/saveReport',{
            method : 'post',
            body : mainForm
        })
        .then(response => response.json())
        .then(data => {
            if(data.message === "success"){
                document.getElementById('success-msg').style.display = "flex";
            }else{
                console.log(data)
                document.getElementById("jjj").innerHTML = data;
                form1.style.display = "flex";
                form2.style.display = "none";
                document.getElementById('right-alert-text').textContent = "Fill all data !";
                document.getElementById('message-content').classList.remove('message-hide');
                let a = setInterval(()=>{
                    document . getElementById('message-content') . classList . add('message-hide');
                    clearInterval(a);
                },5000)
            }
        })
        .catch(e => {
            form1.style.display = "flex";
            form2.style.display = "none";
            document.getElementById('right-alert-text').textContent = "Fill all data !";
            document.getElementById('message-content').classList.remove('message-hide');
            let a = setInterval(()=>{
                document . getElementById('message-content') . classList . add('message-hide');
                clearInterval(a);
            },5000)
        });
    });

    document.getElementById("form2-back").addEventListener('click',()=>{
        form1.style.display = "flex";
        form2.style.display = "none";
        document.getElementById('failed-msg').style.display = "none";
        document.getElementById('success-msg').style.display = "none";
    });

</script>
</html>