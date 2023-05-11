<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message">
        <div class="message-text">
            User has been removed successfully !
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_success.png" alt="error image">
            
        </div>
        <div class="message-btn">
        <a class="message-warn" href="<?php echo BASEURL . "TClassMembers/memDetails/" . $_SESSION["cid"] . "/" . $_SESSION["cname"] ?>">OK</a>
        </div>
    </div>
</div>
