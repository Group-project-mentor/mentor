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
                            <h1>Add New Subject</h1>
                        </div>
                    </div>

                <div class="rc-profile">
                    <div class="rc-profile-main">
                        <a class="rc-profile-image" href="<?php echo BASEURL ?>admins/change/image">
                            <img src="<?php echo (!empty($data[0]->image)) ? $data[0]->image : BASEURL . "assets/clips/profile_img.webp" ?>"
                                 alt="profile"
                                 id="profileImg"
                                 style="object-fit: cover;"/>
                            <span class="rc-profile-change-btn hidden" id="changeBtn">Change</span>
                        </a>
                        <div class="rc-profile-table">
                            
                            <div class="rc-profile-row">
                                <div class="rc-profile-left">
                                    Name
                                </div>
                                <div class="rc-profile-right">
                                    <div>
                                        <?php echo (!empty($data[0]->name)) ? $data[0]->name : "" ?>
                                    </div>
                                    <a href="<?php echo BASEURL ?>admins/change/name">
                                        <img src="<?php echo BASEURL ?>assets/icons/icon_next.png" alt="notify" class="rc-profile-arrow-btn">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <?php require_once("C:/xampp/htdocs/mentor/app/views/admin/popup.php"); ?>

</body>

<script>
    let profileImg = document.getElementById('profileImg');
    let changeBtn = document.getElementById('changeBtn');

    profileImg.addEventListener('mouseover',()=>{
        profileImg.classList.add('rc-profile-img-hidden');
        changeBtn.classList.remove('hidden');
    });

    profileImg.addEventListener('mouseout',()=>{
        profileImg.classList.remove('rc-profile-img-hidden');
        changeBtn.classList.add('hidden');
    })

    const profileBtn = document.getElementById("profile-btn");
    const popupMenu = document.getElementById("popup-menu")
    let toggler = false;

    profileBtn.addEventListener('click', () => {
        if (toggler) {
            popupMenu.style.display = "none";
            toggler = false

        } else {
            popupMenu.style.display = "flex";
            toggler = true
        }
    });

</script>

</html>