<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>change image</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>public/stylesheets/resourceCreator/rc_profile.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
<?php require_once("C:/xampp/htdocs/mentor/app/views/admin/navbar.php"); ?>

        <?php include_once "components/alerts/rightAlert.php"?>
            <!-- Middle part for whole content -->
            <section class="mid-content">
                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Profile - Change Image</h1>
                    <h6><?php echo $_SESSION['name'] ?></h6>
                </div>

                <form class="rc-profile rc-profile-change">
                    <div class="rc-profile-change-img">
                        <img id="profImg" src="<?php echo (!empty($data[0])) ? BASEURL."data/profiles/".$data[0] : BASEURL."assets/clips/profile_img.webp" ?>" alt="profile image">
                    </div>

                    <!-- todo: want to do the functionality and style -->
                    <div class="rc-profile-change-input">
                        <form enctype="multipart/form-data">
                            <input type="file" name="image" id="fileChooser">
                        </form>
                        <a id="sub-btn">SAVE</a>
                        <h3 style="color: purple;font-family:Arial" id="msg"></h3>
                    </div>
                </form>
            </section>

        </div>
    </section>
</body>
<script>
    const BASEURL = '<?php echo BASEURL ?>';
</script>
<script src="<?php echo BASEURL . '/public/javascripts/admin/change_profile.js' ?>"></script>

</html>