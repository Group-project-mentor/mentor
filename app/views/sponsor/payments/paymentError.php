<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment Error</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

        .container{
            display: flex;
            height: 100vh;
            overflow-y: hidden;
            flex-direction: column;
            justify-content: space-around;
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

        a{
            cursor: pointer;
            background-color: green;
            border: none;
            color: white;
            border-radius: 5px;
            margin: 20px 10px 0;
            padding: 10px 20px;
            width: 100%;
            text-align: center;
            text-decoration: none;
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
            width: 20%;
            margin: 50px;
        }

        .inbuilt-success-msg h1{
            font-size: xx-large;
            font-family: "poppins";
        }

        .inbuilt-success-msg a{
            margin: 50px;
            width: 25%;
            font-size: larger;
            cursor: pointer;
            background-color: #c9012f;
            border: none;
            color: white;
            border-radius: 5px;
            /*margin: 20px 10px 0;*/
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
        }

    </style>
</head>

<body>
<section class="container">

        <!-- Middle part for whole content -->
            <div class="inbuilt-success-msg">
                <img src="<?php echo BASEURL ?>/public/assets/icons/big-icon-cross.png" alt="jj">
                <h1>Payment Error</h1>
                <a href="<?php echo BASEURL.'sponsor/paymentTest' ?>">Go Back</a>
            </div>
</section>
</body>
<script>

</script>
</html>