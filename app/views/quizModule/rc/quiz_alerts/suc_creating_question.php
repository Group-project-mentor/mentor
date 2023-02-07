<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message">
        <div class="message-text">
            Quiz saved successfully ! <br/>
            Press OK to add answers for the question !
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/success_msg.png" alt="error image">
        </div>
        <div class="message-btn">
            <a href="<?php echo BASEURL."quiz/addAnswers/$data[0]/$data[1]"?>">OK</a>
        </div>
    </div>
</div>
