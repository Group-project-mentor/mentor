<link rel="stylesheet" href="<?php echo BASEURL?>stylesheets/alerts_styles.css" />
<div class="message-area">
    <div class="message">
        <div class="message-text">
            Resource Updated Successfully !
        </div>
        <div class="message-image">
            <img src="<?php echo BASEURL?>assets/clips/msg_1.png" alt="error image">
        </div>
        <div class="message-btn">
            <a href="<?php 
                    switch ($data[0][3]) {
                        case 'other':
                            echo BASEURL."TResources/others/".$_SESSION['cid'];
                            break;
                        case 'pdf':
                            echo BASEURL."TResources/documents/".$_SESSION['cid'];
                            break;
                    } ?>">
                OK
            </a>
        </div>
    </div>
</div>
