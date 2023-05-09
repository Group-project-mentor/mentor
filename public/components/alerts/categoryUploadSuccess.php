<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message">
        <div class="message-text">
            File uploaded successfully !
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_success.png" alt="error image">
        </div>
        <div class="message-btn">
            <a href="<?php echo BASEURL."rcResources/$category/" . $_SESSION['gid'] . "/".$_SESSION['sid'] ?>">OK</a>
        </div>
    </div>
</div>
