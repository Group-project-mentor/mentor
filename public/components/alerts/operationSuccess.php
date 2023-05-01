<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message">
        <div class="message-text">
            <?php echo $message ?>
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_1.png" alt="error image">
        </div>
        <div class="message-btn">
            <a onclick="location.reload();">
                OK
            </a>
        </div>
    </div>
</div>
