<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Past Papers</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/st_resources.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/st_navbar_2.php" ?> <!-- used to include_once to add file -->


        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="<?php echo BASEURL ?>st_Inside_subject">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo BASEURL ?>st_profile">
                        <img src="<?php echo BASEURL ?>assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Past Papers</h1>
                    <h6>Hello</h6>
                    <br>
                    <h2>C79 - Science</h2>
                </div>

                <!-- Grade choosing interface -->
                <div class="container-box">

                    <div class="rc-resource-table">
                        <div class="rc-pp-row rc-pp-row-head">
                            <div class="rc-resource-col">Past Papers Name</div>
                            <div class="rc-resource-col">year</div>
                            <div class="rc-resource-col">Part</div>
                            <div></div>
                        </div>

                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Genaral </div>
                            <div class="rc-resource-col">2019</div>
                            <div class="rc-resource-col">1</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Tutorial 1</div>
                            <div class="rc-resource-col">2018</div>
                            <div class="rc-resource-col">2</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="rc-pp-row">
                            <div class="rc-resource-col">Tutorial 2</div>
                            <div class="rc-resource-col">2017</div>
                            <div class="rc-resource-col">2</div>
                            <div class="rc-quiz-row-btns">
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_do">
                                    <img src="<?php echo BASEURL ?>assets/icons/Interface Arrows Button Down Double by Streamlinehq.png" alt="">
                                </a>
                                <a href="<?php echo BASEURL ?>st_pastpapers/st_pastpaper_down">
                                    <img src="<?php echo BASEURL ?>assets/icons/External_Download_by_Streamlinehq.png" alt="">
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </section>
</body>
<script>
    let toggle = true;

    const getElement = (id) => document.getElementById(id);

    let togglerBtn = getElement("nav-toggler");
    let nav = getElement("nav-bar");
    let logoLong = getElement("nav-logo-long");
    let navMiddle = getElement("nav-middle");
    let navLinkTexts = document.getElementsByClassName("nav-link-text");

    togglerBtn.addEventListener('click', () => {
        nav.classList.toggle("nav-bar-small");

        if (toggle) {
            logoLong.classList.add("hidden");
            navMiddle.classList.add("hidden");
            togglerBtn.classList.add("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.add("hidden");
            }
            toggle = false;
        } else {
            logoLong.classList.remove("hidden");
            navMiddle.classList.remove("hidden");
            togglerBtn.classList.remove("toggler-rotate");
            for (i = 0; i < navLinkTexts.length; i++) {
                navLinkTexts[i].classList.remove("hidden");
            }
            toggle = true;
        }
    })
</script>

</html>