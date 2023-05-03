<?php $premium = $this->model("premiumModel")->getPremium($_SESSION['id']);?>

<a  href="<?php echo BASEURL . 'TProfile/profile' ?>">
    <?php if($premium ==1){?>
    <img src="<?php echo BASEURL?>assets/Teacher/icons/crown.png" alt="profile">
    <?php } ?>
</a>