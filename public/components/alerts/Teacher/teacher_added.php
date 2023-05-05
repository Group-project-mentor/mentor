<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="hidden" id="delConfMsg"">
    <div class="message">
        <div class="message-text" id="msgTxt">
            Confirm Adding the Teacher ?
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/Teacher/clips/restrict_student.png" alt="error image">
        </div>
        <div class="message-btn">
            <a id="acceptBtn">Accept</a>
            <a onclick="declineConfBox()" class="message-warn">Decline</a>
        </div>
    </div>
</div>
