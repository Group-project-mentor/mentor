<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report issue </title>
    
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/st_card_set.css' . '/public/stylesheets/style.css' .'/public/stylesheets/st_student.css'?> ">    <!-- BASEURL use to navigate pages -->

</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/rc_nav_1.php"?>

        <!-- Right side container -->
        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">
                <div></div>
                <div class="top-bar-btns ">
                    <a href="/implimentation/studnt thimira/profile/grades.html">
                        <div class="back-btn">Back</div>
                    </a>
                    <a href="#">
                        <img src="assets/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="#">
                        <img src="assets/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                 <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Report Issues</h1>
                    <h6>Student Home/ Report Issues</h6>
                    <br><br><br>
                    <h3>Choose a category under your complaint</h3>
                </div>
                
                <div class="class-section">
                    <form>
                  
                      <label for="issue"></label>
                      <select id="issue" name="issue" ">
                        <option value="Category1">Category 1</option>
                        <option value="Category2">Category 2</option>
                        <option value="Category3">Category 3</option>
                        <option value="Category4">Category 4</option>
                        <option value="Category5">Category 5</option>
                        <option value="Category6">Category 6</option>
                      </select>
                        <input type="submit" value="Next" class="back-btn">
                      </form>
                  </div>
            </section>

             <!-- bottom part -->
             <section class="Teacher-class-bottom">
                <div class="issue-decorator">
                    <img src="../profile/assets/grades/lie2.png" alt="lie" style="height: 200px; width: 200px;">
                    <img src="../profile/assets/clips/issue.png" alt="issue man" style=" max-width: 500px; padding-left: 100px;">
                    
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
        }

        else {
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