<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="hidden" id="delConfMsg"">
    <div class="message">
        <center>
        <div class="message-text" id="msgTxt">
            Confirm Funding the student ?
        </div>
        </center>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/lap_man.png" alt="error image">
        </div>
        <div class="message-btn">
            <a id="acceptBtn">Accept</a>
            <a onclick="declineConfBox()" class="message-warn">Decline</a>
        </div>
    </div>
</div>
