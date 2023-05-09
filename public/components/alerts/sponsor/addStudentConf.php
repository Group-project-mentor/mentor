<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="hidden" id="delConfMsg"">
    <div class="message">
        <div class="message-text" id="msgTxt">
            Confirm Funding the student ?
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_2.png" alt="error image">
        </div>
        <div class="message-btn">
            <a id="acceptBtn">Accept</a>
            <a onclick="declineConfBox()" class="message-warn">Decline</a>
        </div>
    </div>
</div>
