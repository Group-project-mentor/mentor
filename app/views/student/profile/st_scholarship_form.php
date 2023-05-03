<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Student Scholarship</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/resourceCreator/rc_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_4.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">

                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_profile/Scholarship_page1">
                        <div class="back-btn">Back</div>
                    </a>
                    <?php include_once "components/notificationIcon.php" ?>
                    <a href="<?php echo BASEURL  ?>st_profile">
                        <img src="<?php echo BASEURL ?>public/assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">
            <hr style="color: green; height:7px; background-color:green;">
            <br>
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h2>Scholarship Application Form</h2>
                    <h3><?php echo "Hello " . $_SESSION['name'] . "!" ?></h3>
                    
                </div>
                <!-- Grade choosing interface -->
                <div class="rc-upload-box">

                    <form method="POST" id="rc-form">
                        <div class="rc-upload-home-title">
                            Fill this with correct data
                        </div>
                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> First Name* : </label>
                                <input type="text" name="firstName" placeholder="First Name" value="<?php echo empty($data[0]) ? "" : $data[0]->firstName ?>" maxlength="25" required />
                            </div>
                            <div class="rc-form-group">
                                <label> Last Name* : </label>
                                <input type="text" name="lastName" placeholder="Last Name" value="<?php echo empty($data[0]) ? "" : $data[0]->lastName ?>" maxlength="25" required />
                            </div>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Name with Initials* : </label>
                                <input type="text" name="fullName" placeholder="Full Name" value="<?php echo empty($data[0]) ? "" : $data[0]->fullName ?>" pattern="^[A-Za-z]+((\s)?((\.)|(?:\b[A-Za-z])[A-Za-z]*\.?)){0,2}$" maxlength="50" required />
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Email* : </label>
                            <input type="text" name="email" placeholder="Email" value="<?php echo empty($data[0]) ? "" : $data[0]->payEmail ?>" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" required />
                            <small>This should be your login email</small>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Gradient Name * : </label>
                                <input type="text" name="gradientname" placeholder="Full Name" value="<?php echo empty($data[0]) ? "" : $data[0]->gradientname ?>" pattern="^[A-Za-z]+((\s)?((\.)|(?:\b[A-Za-z])[A-Za-z]*\.?)){0,2}$" maxlength="50" required />
                            </div>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Your Telephone No * : </label>
                                <input type="text" name="tel1" placeholder="Telephone No" value="<?php echo empty($data[0]) ? "" : $data[0]->payPhone  ?>" pattern="^(?:\+94|0)[1-9]\d{8}$" required />
                            </div>
                            <div class="rc-form-group">
                                <label> Gradient Telephone No * : </label>
                                <input type="text" name="tel2" placeholder="Telephone No" value="<?php echo empty($data[0]) ? "" : $data[0]->payPhone ?>" pattern="^(?:\+94|0)[1-9]\d{8}$" />
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Address* : </label>
                            <input type="text" name="address" placeholder="Address" value="<?php echo empty($data[0]) ? "" : $data[0]->address ?>" required maxlength="100" />
                        </div>

                        <div class="rc-form-group">
                            <label> School* : </label>
                            <input type="text" name="school" placeholder="School" value="<?php echo empty($data[0]) ? "" : $data[0]->school ?>" required maxlength="100" />
                        </div>

                        <div class="rc-form-group">
                            <label> Date of Birth* : </label>
                            <input type="date" name="dob" placeholder="Date" value="<?php echo empty($data[0]) ? "" : $data[0]->dob ?>" required maxlength="100" />
                        </div>

                        <div class="rc-form-group" style="flex: 1;">
                            <label> Gender* : </label>
                            <label>
                                <select class="pp-quiz-chooser" name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                </select>
                            </label>
                        </div>

                        <hr class="rc-form-hr" />

                        <div class="rc-form-group">
                            <label> Brief Description of you* : </label>
                            <textarea class="form-group-textarea" name="description" id="" placeholder="Ex: Why are you applying to this?" required></textarea>
                        </div>

                        <label> Are you Joined any Private Class in here* ?</label>
                        <div class="rc-form-group-hz" style="margin-top: 10px;">
                            <div class="checkbox-set">
                                <label>
                                    <input type="checkbox" name="class[]" value="video" />
                                    Yes
                                </label>
                                <label>
                                    <input type="checkbox" name="class[]" value="pdf" />
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Subjects that you are enrolled in* : </label>
                            <textarea class="form-group-textarea" name="subjects" id="" placeholder="Ex: Mathematics, Sinhala, Science" required></textarea>
                            <small>Enter your subject areas in comma seperated manner...</small>
                        </div>

                        <div class="rc-form-group">
                            <label> Your CV* : </label>
                            <input type="file" name="cv" class="normal-file-input" required>
                            <small style="padding-left: 10px;text-align: left;">Should be in pdf format</small>
                        </div>

                        

                        <hr class="rc-form-hr" />

                        <div class="rc-upload-home-title">
                            <input type="checkbox" name="confirmCheck" id="conf-check" value="confirm" />
                            I confirm above details are true
                        </div>
                        <div class="rc-upload-button">
                            <button type="submit" name="submit" col="200" id="payhere-payment" style="margin:10px auto;width: 100%;">
                                Apply Form
                            </button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </section>
    </div>
    </section>
</body>

</html>