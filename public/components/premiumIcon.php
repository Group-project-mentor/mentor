<?php $premium = $this->model("premiumModel")->getPremium($_SESSION['id']);
if ($premium !== null and $premium!==0) {
    $premium = $premium->active;
} else {
    $premium = 0;
}
?>

<style>
    .premium {
        position: relative;
        display: inline-block;
    }

    .premium .badge {
        position: absolute;
        bottom: 0.9cm; /* move the badge 0.5cm up */
        left: 0.24cm; /* move the badge 0.5cm left */
        color: white;
        padding: 4px 9px;
        border-radius: 50%;
    }


    .premium i {
        size: 5px;
    }

    .premium .badge img {
        width: 22px;
        height: 22px;
    }

</style>
<a class="premium" href="<?php echo BASEURL . 'TProfile' ?>">
    <?php if ($premium == 1) { ?>
        <span class="badge">
            <img src="<?php echo BASEURL?>public/assets/Teacher/icons/crown.png" alt="star">
        </span>
    <?php } ?>
    <img 
    src="<?php echo (!empty($_SESSION['profilePic'])) ? BASEURL . "data/profiles/".$_SESSION['profilePic'] : BASEURL . "assets/icons/icon_profile_black.png" ?>" 
    alt="profile"
    style="width: 30px; height: 30px; border-radius: 50%;object-fit: cover;margin: 0;"
    >
</a>

