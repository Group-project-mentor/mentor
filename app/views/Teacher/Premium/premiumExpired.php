<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Expired</title>


    <style>
        body {
            background-color: rgba(252, 252, 252, 255);
        }

        .start-btn,
        .cancel-btn {
            background-color: #186537;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
        }

        .start-btn:hover,
        .cancel-btn:hover {
            opacity: 0.8;
            /* Reduce opacity on hover */
        }

        .cancel-btn {
            background-color: #186537;
            color: white;
        }

        .container {
            flex: 1;
            margin-left: 100px;
            margin-top: 50px;
        }

        .mid-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-right: 100px;
        }

        .mid-right a {
            display: inline-block;
        }

        .start-btn {
            margin-right: 10px;
        }

        @font-face {
            font-family: 'Cormorant Garamond', serif;
            font-family: 'PT Sans', sans-serif;
            font-family: 'Roboto Condensed', sans-serif;
            src: url('your-font-file') format('woff');
            /* adjust the format as needed */
            font-weight: normal;
            font-style: normal;
            text-align: center;
        }

        .mid-right {
            text-align: center;
            
            /* use the font in the mid-right section */
        }
    </style>
</head>

<body>

    <div style="display: flex;">
        <div class="container">
            <div id="lottie-container">
                <img src="<?php echo BASEURL ?>public/assets/Teacher/clips/ufo.gif" alt="notify">
            </div>
        </div>

        <div class="mid-right">
            <h2 style="color:green ; text-align:center ;padding: 5px 10px;">Your Premium Has expired :(</h2>
            <p>If you want to continue, either you can buy premium again or cancel <br>premium & stay in free version.

                However if your wish to stay in free version,<br> then you have to work under restrictions.
            </p>
            <div style="display: flex;">
                <a href="#" style="display:inline-block;">
                    <button class="start-btn">Buy Premium</button>
                </a>
                <a href="<?php echo BASEURL . 'home' ?>" style="display:inline-block; text-decoration:none;">
                    <button class="cancel-btn">Cancel Premium</button>
                </a>
            </div>
        </div>
    </div>

</body>

</html>