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
                            echo BASEURL."rcEdit/".$data[0][3]."/".$data[0][0];
                            break;
                        case 'pdf':
                            echo BASEURL."rcEdit/document/".$data[0][0];
                            break;
                    }?>">OK</a>
        </div>
    </div>
</div>
