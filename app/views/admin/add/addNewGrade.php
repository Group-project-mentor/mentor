<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>profile</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/resourceCreator/rc_resources.css' ?> ">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
</head>

<body>

    <?php
if (!empty($data[1]) && $data[1] == "success") {
    include_once "components/alerts/password_changed.php";
}
?>

        <!-- Navigation panel -->
        <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>
            <!-- Middle part for whole content -->
            <section class="mid-content">



                <div class="rc-resource-header">
                        <!-- Title and sub title of middle part -->
                        <div class="mid-title">
                            <h1>Add New Grade</h1>
                        </div>
                    </div>

                    <form class="rc-profile rc-profile-change">
                        <div class="rc-profile-change-img">
                            <img id="profImg" src="<?php echo (!empty($data[0])) ? BASEURL."data/profiles/".$data[0] : BASEURL."assets/clips/profile_img.webp" ?>" alt="profile image">
                        </div>

                        <!-- todo: want to do the functionality and style -->
                        <div class="rc-profile-change-input">
                            <form enctype="multipart/form-data">
                                <input type="file" name="image" id="fileChooser">
                                <div class="rc-text-inp-grp">
                                    <!-- <label for="name" class="lbl-input">Name : </label><br> -->
                                    <input 
                                        type="text" 
                                        class="txt-input" 
                                        placeholder="Grade" 
                                        value="" 
                                        name="grade"
                                        id="grade" 
                                        pattern="[A-Za-z0-9][A-Za-z0-9 ]+"
                                        title="Invalid name !"    />
                                </div>
                                <a id="sub-btn">SAVE</a>
                                <h3 style="color: purple;font-family:Arial" id="msg"></h3>
                            </form>
                        </div>
                    </form>

            </section>
        </div>
    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>

</body>

<script>
    const BASEURL = '<?php echo BASEURL ?>';
</script>

<script src="<?php echo BASEURL . '/public/javascripts/admin/gradeNsubject.js' ?>"></script>
</html>