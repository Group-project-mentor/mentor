<link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/admin/ad_popupmenue.css">

<section id="popup-menu">
    <div class="tab" style="border-top-left-radius:20px;border-top-right-radius:20px">
        <a href="<?php echo BASEURL ?>admins/profile" class="popup-link">
            <div class="tabcont">
                <img class="icon" src="<?php echo BASEURL ?>assets/admin/profileicon.png">
                Profile
            </div>
        </a>
    </div>
    <div class="tab">
        <a href="<?php echo BASEURL ?>admins/settings" class="popup-link">
            <div class="tabcont">
                <img class="icon" src="<?php echo BASEURL ?>assets/admin/settingicon.png">
                Settings
            </div>
        </a>
    </div>
    <div class="tab">
        <a href="<?php echo BASEURL ?>admins/activitylog" class="popup-link">
            <div class="tabcont">

                <img class="icon" src="<?php echo BASEURL ?>assets/admin/activitylogicon.png">
                Activity Log
            </div>
        </a>
    </div>
    <div class="tab" style="border-bottom-left-radius:20px;border-bottom-right-radius:20px">
        <a href="<?php echo BASEURL . 'logout'?> " class="popup-link">
            <div class="tabcont">
                    <img class="icon" src="<?php echo BASEURL ?>assets/admin/logouticon.png">
                    Logout
            </div>
        </a>
    </div>
</section>