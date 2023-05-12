<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="hidden" id="delConfMsg2"">
    <div class="message message-back-warn">
        <div class="message-text message-text-warn" id="msgTxt">
            Your Amount is Exeeded ! <br>
            Still you want to add this student ?
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/lap_man.png" alt="error image">
        </div>
        <div class="message-btn">
            <a id="acceptBtn2">YES</a>
            <a onclick="declineConfBox2()" class="message-warn">NO</a>
        </div>
    </div>
</div>
