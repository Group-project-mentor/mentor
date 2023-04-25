<?php $notificationCount = $this->model("notificationModel")->getNotificationCount($_SESSION['id']); ?>
<style>
    .notification {
        position: relative;
        display: inline-block;
    }

    .notification .badge {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(5, 109, 54, 0.89);
        color: white;
        padding: 4px 9px;
        border-radius: 50%;
    }

    .notification i {
        font-size: 24px;
    }

</style>
<a class="notification" href="<?php echo BASEURL . 'notification' ?>">
    <?php if($notificationCount > 0){?>
        <span class="badge"><?php echo $notificationCount ?></span>
    <?php } ?>
    <img src="<?php echo BASEURL?>assets/icons/icon_notify.png" alt="notify">
</a>