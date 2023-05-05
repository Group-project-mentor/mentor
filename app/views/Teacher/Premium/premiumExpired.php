<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Expired</title>
    <script>
        window.history.forward();
    </script>

    <style>
        .start-btn,
        .cancel-btn {
            background-color: #4CAF50;
            /* Green background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 12px 24px;
            /* Some padding */
            text-align: center;
            /* Center text */
            text-decoration: none;
            /* Remove underline */
            display: inline-block;
            /* Make the buttons appear side by side */
            font-size: 16px;
            /* Set font size */
            margin-right: 10px;
            /* Add some space between the buttons */
        }

        .start-btn:hover,
        .cancel-btn:hover {
            opacity: 0.8;
            /* Reduce opacity on hover */
        }

        .cancel-btn {
            background-color: #f44336;
            /* Red background for cancel button */
        }
    </style>
</head>

<body>
    <h1>your premium membership has been expired. So, If you want to move further,
        first choose which option you want to stay</h1>
    <br><br>
    <a href="#">
    <button class="start-btn">Start</button>
    </a>
    <a href="<?php echo BASEURL . 'home'?>">
    <button class="cancel-btn">Cancel</button>
</a>



</body>

</html>