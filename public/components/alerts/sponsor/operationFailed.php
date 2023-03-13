<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message message-back-warn">
        <div class="message-text message-text-warn">
            <?php echo $_SESSION['message'] ?>
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_1.png" alt="error image">
        </div>
        <div class="message-btn">
            <a class="message-warn" onclick="location.reload();" >Retry</a>
        </div>
    </div>
</div>
