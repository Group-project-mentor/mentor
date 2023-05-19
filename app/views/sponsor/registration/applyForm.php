
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Sponsor Form</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <style>
        .bar {
            height: 10px;
            accent-color: green;
            background-color: green; /* Set the background color to green */
            border-radius: 5px;
            margin-top: 10px;
            width: 50%;
            transition: width 0.3s ease-in-out;
        }
    </style>
    <!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?><!-- ">-->
</head>

<body>

<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>
    <div class="content-area">
        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <h1>Register as a Sponsor</h1>
            </div>
            <div class="top-bar-btns">
                <a onclick="history.back()">
                    <div class="back-btn">Back</div>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Grade choosing interface -->
            <div class="rc-upload-box">
                    <form method="POST" id="rc-form">
                        <div class="rc-upload-home-title">
                            Fill this with correct data
                        </div>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> First Name* : </label>
                                <input type="text" name="firstName"
                                       placeholder="First Name"
                                       value=""
                                       maxlength="25"
                                       required />
                            </div>
                            <div class="rc-form-group">
                                <label> Last Name* : </label>
                                <input type="text" name="lastName"
                                       placeholder="Last Name"
                                       value=""
                                       maxlength="25"
                                       required />
                            </div>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Name with Initials* : </label>
                                <input type="text" name="fullName"
                                       placeholder="Name with Initials"
                                       value=""
                                       maxlength="50"
                                       required/>
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Email* : </label>
                            <input type="text" name="email"
                                   placeholder="Email"
                                   value=""
                                   pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
                                   required/>
                            <small>This should be your login email</small>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Telephone No 1 * : </label>
                                <input type="text" name="tel1"
                                       placeholder="Telephone 1"
                                       value=""
                                       pattern="^(?:\+94|0)[1-9]\d{8}$"
                                       required/>
                            </div>
                            <div class="rc-form-group">
                                <label> Telephone No 2  : </label>
                                <input type="text" name="tel2"
                                       placeholder="Telephone 2"
                                       value=""
                                       pattern="^(?:\+94|0)[1-9]\d{8}$"
                                />
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Address* : </label>
                            <input type="text" name="address" placeholder="Address" value="" required maxlength="100"/>
                        </div>

                        <hr class="rc-form-hr"/>
                        
                        <div class="rc-form-group">
                            <label> <b>Max amount</b> that you can give <b>Monthly</b>: 
                                <label id="max-amount" style="padding:5px 10px;background-color:gray;border-radius:5px;color:white;">5000 LKR</label>
                            </label>
                            <input type="range" id="range-input" min="5000" max="50000" name="maxAmount" value="5000" onchange="updateBar()">
                        </div>

                        <div class="rc-form-group">
                            <label> How did you know about us* : </label>
                            <textarea class="form-group-textarea" name="howKnew" id="" placeholder="Ex: From a friend of mine" required></textarea>
                        </div>
                    
                        <hr class="rc-form-hr"/>

                        <div class="rc-upload-home-title">
                            <input type="checkbox" name="confirmCheck" id="conf-check" value="confirm"/>
                            I confirm above details are true
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">
                                Apply Form
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </body>
    <script>
        const BASEURL = '<?php echo BASEURL?>';
    </script>
    <script src="<?php echo BASEURL."javascripts/sp_form.js" ?>"></script>
</html>