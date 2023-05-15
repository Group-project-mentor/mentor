
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Resource Creator Form</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
<!--    <link rel="stylesheet" href="--><?php //echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?><!-- ">-->

</head>

<body>

<section class="page">
    <?php include_once "components/alerts/rightAlert.php"?>
    <div class="content-area">
        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <h1>Register as a Resource Creator</h1>
            </div>
            <div class="top-bar-btns">
                <a href="<?php echo BASEURL."landing" ?>" >
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
                                       value="<?php echo empty($data[0])?"":$data[0]->firstName ?>"
                                       maxlength="25"
                                       required />
                            </div>
                            <div class="rc-form-group">
                                <label> Last Name* : </label>
                                <input type="text" name="lastName"
                                       placeholder="Last Name"
                                       value="<?php echo empty($data[0])?"":$data[0]->lastName ?>"
                                       maxlength="25"
                                       required />
                            </div>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Name with Initials* : </label>
                                <input type="text" name="fullName"
                                       placeholder="First Name"
                                       value="<?php echo empty($data[0])?"":$data[0]->firstName ?>"
                                       maxlength="50"
                                       required/>
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Email* : </label>
                            <input type="text" name="email"
                                   placeholder="Email"
                                   value="<?php echo empty($data[0])?"":$data[0]->payEmail ?>"
                                   pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$"
                                   required/>
                            <small>This should be your login email</small>
                        </div>

                        <div class="rc-form-group-hz">
                            <div class="rc-form-group">
                                <label> Telephone No 1 * : </label>
                                <input type="text" name="tel1"
                                       placeholder="Telephone 1"
                                       value="<?php echo empty($data[0])?"":$data[0]->payPhone  ?>"
                                       pattern="^(?:\+94|0)[1-9]\d{8}$"
                                       required/>
                            </div>
                            <div class="rc-form-group">
                                <label> Telephone No 2  : </label>
                                <input type="text" name="tel2"
                                       placeholder="Telephone 2"
                                       value="<?php echo empty($data[0])?"":$data[0]->payPhone?>"
                                       pattern="^(?:\+94|0)[1-9]\d{8}$"
                                />
                            </div>
                        </div>

                        <div class="rc-form-group">
                            <label> Address* : </label>
                            <input type="text" name="address" placeholder="Address" value="<?php echo empty($data[0])?"":$data[0]->address ?>" required maxlength="100"/>
                        </div>

                        <div class="rc-form-group" style="flex: 1;">
                            <label> Gender* : </label>
                            <label>
                                <select class="pp-quiz-chooser"  name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                </select>
                            </label>
                        </div>

                        <hr class="rc-form-hr"/>

                        <div class="rc-form-group">
                            <label> Brief Description of you* : </label>
                            <textarea class="form-group-textarea" name="description" id="" placeholder="Ex: Educational qualifications, Why are you applying to this?" required></textarea>
                        </div>

                        <div class="rc-form-group">
                            <label> Subjects that you are expert in* : </label>
                            <textarea class="form-group-textarea" name="subjects" id="" placeholder="Ex: Mathematics, Sinhala, Science" required></textarea>
                            <small>Enter your subject areas in comma seperated manner...</small>
                        </div>

                            <div class="rc-form-group">
                                <label> Example resource that you created early* : </label>
                                <input type="file" name="workSample" class="normal-file-input" required>
                                <small style="padding-left: 10px;text-align: left;">Maximum 100MB file</small>
                            </div>

                            <div class="rc-form-group">
                                <label> Your CV* : </label>
                                <input type="file" name="cv" class="normal-file-input" required>
                                <small style="padding-left: 10px;text-align: left;">Should be in pdf format</small>
                            </div>

                        <label > What resource types you can create ?</label>
                        <div class="rc-form-group-hz" style="margin-top: 10px;">
                            <div class="checkbox-set">
                                <label>
                                    <input type="checkbox" name="resources[]" value="video" />
                                    Videos
                                </label>
                                <label>
                                    <input type="checkbox" name="resources[]" value="pdf"/>
                                    Documents
                                </label>
                                <label>
                                    <input type="checkbox" name="resources[]" value="quiz"/>
                                    Quizzes
                                </label>
                            </div>
                            <div class="checkbox-set">
                                <label>
                                    <input type="checkbox" name="resources[]" value="pastpaper"/>
                                    Pastpapers
                                </label>
                                <label>
                                    <input id="other-input-check" type="checkbox" name="resources[]" style="accent-color: #00AE46;" value="other"/>
                                    Other types
                                    <input id="other-input" type="text" name="otherTypes" style="width: 100%;padding:5px 10px;display: none;" maxlength="15" placeholder="your resource type">
                                </label>
                            </div>
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
<script src="<?php echo BASEURL."javascripts/rc_form.js" ?>"></script>

</html>