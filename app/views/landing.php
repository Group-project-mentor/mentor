<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location:" . BASEURL . "home");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL ?>stylesheets/landing/landing.css">
    <title>M E N T O R</title>
</head>

<body>
    <div class="landing-content">

        <!-- nav bar -->
        <nav class="landing-nav-main">
            <a class="landing-nav-logo" href="#Home">
                <img src="<?php echo BASEURL ?>assets/landing/logo1.png" alt="">
            </a>
            <div class="three-bars" id="toggler">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
            <div class="landing-nav-links nav-hidden" id="nav-links">
                <a class="landing-nav-link" href="#Home">Home</a>
                <a class="landing-nav-link">About</a>
                <a class="landing-nav-link" href="#BMC">Buy us a coffee</a>
                <a class="landing-nav-link" href="#footer">Contact us</a>
                <a class="landing-nav-link landing-special-btn" href="<?php echo BASEURL ?>login">Login</a>
            </div>
        </nav>

        <!--landing hero section-->
        <a name="Home"></a>
        <section class="landing-hero-section landing-hero-resp-1">
            <div>
                <div class="landing-hero-left">
                    <h1 class="landing-hero-title">
                        Better Learning Experience <br> for Everyone...
                    </h1>
                    <h2 class="landing-hero-title">
                        This is the BEST platform to do your self studies as a student
                    </h2>
                    <a href="<?php echo BASEURL ?>register" class="landing-btn">
                        Register as a student
                    </a>
                </div>
                <div class="landing-hero-right">
                    <img src="<?php echo BASEURL ?>assets/landing/image1.png" alt="">
                </div>

            </div>
        </section>

        <section class="landing-hero-section landing-hero-resp-2">
            <div class="hero-reverse">
                <div class="landing-hero-left hero-left-reverse">
                    <h1 class="landing-hero-title">
                        Create your own LMS <br> for your class ...
                    </h1>
                    <a href="<?php echo BASEURL ?>teacher" class="landing-btn green">
                        Register as a Teacher
                    </a>
                </div>
                <div class="landing-hero-right">
                    <img src="<?php echo BASEURL ?>assets/landing/image2.png" alt="">
                </div>
            </div>
        </section>

        <section class="landing-mid-container">
            <div>
                <h1>WHAT YOU GET AS PUBLIC STUDENT</h1>
                <div class="landing-list">
                    <ul>
                        <li><img src="<?php echo BASEURL ?>assets/landing/arrow.png"> 1000+ Public Resources</li>
                        <li><img src="<?php echo BASEURL ?>assets/landing/arrow.png"> Quizzes and Answers</li>
                        <li><img src="<?php echo BASEURL ?>assets/landing/arrow.png"> Scholarship Programs</li>
                        <li><img src="<?php echo BASEURL ?>assets/landing/arrow.png"> Past Papers with Answers</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="landing-resource-ctr">
            <div class="landing-sponsor-area">
                <h1 class="landing-sp-heading">
                    Join with Us as a Content Creator
                </h1>

                <div class="landing-sp-description">
                    Our website is on the lookout for talented resource creators to help us continue delivering
                    high-quality content to our users. As a resource creator, you will have the opportunity to showcase
                    your skills and expertise, while working alongside a team of dedicated professionals. Whether you're
                    an experienced creator or just starting out, we welcome all levels of talent and are committed to providing
                    a supportive and collaborative work environment. Join us today and help shape the future of our website!
                </div>

                <div class="landing-sp-btn">
                    <a class="landing-BMC-btn" href="<?php echo BASEURL."landing/registerCreator/instructions"?> ">
                        <i class="fa-solid fa-person-chalkboard fa-beat-fade"></i>
                        BECOME A CREATOR
                    </a>
                </div>
            </div>
            <a name="BMC"></a>
        </section>

        <section class="landing-BMC">
            <div>
                <h1>BUY US A COFFEE . . .</h1>
                <div class="landing-BMC-description">
                    Our website offers a way for users to support our mission of providing free public services for students.
                    By buying us a coffee, users can contribute to the maintenance and development of our public Learning
                    Management System (LMS). The LMS provides access to educational resources, study materials, and online
                    courses for students around the world. Your support helps us continue to offer these services for free.
                </div>
                <a class="landing-BMC-btn" href="<?php echo BASEURL."home/bmc" ?>">
                    <i class="fa-solid fa-hand-holding-dollar fa-beat-fade"></i>
                    BUY US A COFFEE
                </a>
            </div>
        </section>



        <section class="landing-sponsor">
            <div class="landing-sponsor-area">
                <h1 class="landing-sp-heading">
                    The greatest gift you can give someone is education
                </h1>

                <div class="landing-sp-description">
                    Our website provides a platform for students to get funding from registered sponsors.
                    By registering as a sponsor, individuals and organizations can make donations to support
                    students' education. Students can create profiles and apply for funding, while sponsors
                    can browse profiles and select the students they wish to support. Our website streamlines
                    the process of connecting students with sponsors, making it easier for both parties to benefit
                    from this arrangement.
                </div>

                <div class="landing-sp-btn">
                    <a class="landing-BMC-btn" href="<?php echo BASEURL ?>landing/registerSponsor/instructions">
                        <i class="fa-solid fa-handshake-angle fa-beat-fade"></i>
                        BECOME A SPONSOR
                    </a>
                </div>
            </div>
        </section>

        <!--        footer area-->
        <a name="footer"></a>
        <footer>
            <div class="landing-foot-left">
                <h3>Quick links</h3>
                <ul>
                    <li><i class="fa-solid fa-play"></i>Home</li>
                    <li><i class="fa-solid fa-play"></i>Donate</li>
                    <li><i class="fa-solid fa-play"></i>FAQ</li>
                    <li><i class="fa-solid fa-play"></i>About</li>
                    <li><i class="fa-solid fa-play"></i>Premium Plans</li>
                </ul>
            </div>
            <div class="landing-foot-bar-h">

            </div>
            <div class="landing-foot-right">
                <div class="landing-foot-contact">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="fa-solid fa-phone"></i>011-7872***</li>
                        <li><i class="fa-solid fa-phone"></i>011-7673***</li>
                        <li><i class="fa-solid fa-at"></i>admin@mentor.com</li>
                    </ul>
                </div>
                <div class="landing-foot-logos">
                    <img src="<?php echo BASEURL ?>assets/landing/logo2.png" alt="main logo">
                    <h3>Follow us on : </h3>
                    <div>
                        <a href=""><i class="fa-brands fa-facebook fa-bounce"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin fa-bounce"></i></a>
                        <a href=""><i class="fa-brands fa-instagram fa-bounce"></i></a>
                        <a href=""><i class="fa-brands fa-square-twitter fa-bounce"></i></a>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <img class="landing-vector-1" src="<?php echo BASEURL ?>assets/landing/vector1.png" alt="">
    <img class="landing-vector-2" src="<?php echo BASEURL ?>assets/landing/vector2.png" alt="">
</body>

<!-- Font awesome icons -->
<script src="https://kit.fontawesome.com/d8b7401f82.js" crossorigin="anonymous"></script>
<script>
    let navLinks = document.getElementById('nav-links');
    let toggler = document.getElementById('toggler');
    toggler.addEventListener('click', () => {
        navLinks.classList.toggle('nav-active');
        toggler.classList.toggle('three-bars-cross');
    })
</script>

</html>