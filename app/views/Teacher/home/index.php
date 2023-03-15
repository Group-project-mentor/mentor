

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher home</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <nav class="nav-bar" id="nav-bar">

            <!-- Navigation bar logos -->
            <div class="nav-upper">
                <div class="nav-logo-short">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo2.png" alt="logo" />
                </div>
                <div class="nav-logo-long" id="nav-logo-long">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/logo1.png" alt="logo" />
                </div>
            </div>





            <!-- Navigation buttons -->
            <div class="nav-links">
                <a href="<?php echo BASEURL ?>" class="nav-link">
                    <img class="active" src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_class.png" alt="home">
                    <div class="nav-link-text">Classes</div>
                </a>
                <a href="<?php echo BASEURL ?>TPremium/premiumPlan" class="nav-link">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_premium.png" alt="cource">
                    <div class="nav-link-text">Buy Premium</div>
                </a>
                <a href="<?php echo BASEURL ?>TReportIssue/reportIssues" class="nav-link">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_report.png" alt="profile">
                    <div class="nav-link-text">Report Issue</div>
                </a>
                <a href="<?php echo BASEURL ?>TBilling/Billing1" class="nav-link">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_billing.png" alt="report">
                    <div class="nav-link-text">Billing</div>
                </a>
                <a href="<?php echo BASEURL ?>TBmc/bmc1" class="nav-link">
                    <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_bmc.png" alt="bmc">
                    <div class="nav-link-text">Buy me a coffee</div>
                </a>
            </div>

            <!-- Navigation bar toggler -->
            <div class="nav-toggler" id="nav-toggler">
                <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/toggler.png" alt="toggler">
            </div>
        </nav>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div class="search-bar">
                    <input type="text" name="" id="" placeholder="Search...">
                    <a href="">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_search.png" alt="">
                    </a>
                </div>
                <div class="top-bar-btns">
                    <a href="#">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>privateclass/profile">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Teacher Home</h1>
                    <h6>Hello <?php echo $_SESSION['name'] ?>,</h6>
                </div>

                <!-- subject cards -->
                <div class="container-box">
                    <div class="mid-down-title">
                        <br><br>
                        <h3>Ongoing classes</h3>
                    </div>
                    <div class="mid-bar-btns">
                        <a href="<?php BASEURL ?>TClassRoom/createClass">
                            <div class="mid-back-btn">Create class</div>
                        </a>
                    </div>
                    <?php if (!empty($data[0])) {
                        $count = 1
                    ?>

                        <div class="subject-card-set">
                            <?php foreach ($data[0] as $row) { ?>
                                <div class="subject-card">
                                    <a href="<?php BASEURL ?>TInsideClass/InClass">
                                        <img alt='' src="<?php echo BASEURL . "public/assets/Teacher/patterns/" . $count++ . '.png' ?>" />
                                    </a>
                                    <a href="#"><label><?php echo $row->class_id ?></label></a>
                                    <a href="#"><label><?php echo $row->class_name ?></label></a>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else {
                        echo "no data!";
                    } ?>

                </div>




            </section>
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