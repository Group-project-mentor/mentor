<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher create report 1</title>
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/style.css">
    <link rel="stylesheet" href="<?php echo BASEURL ?>public/stylesheets/Teacher/card_set.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        /* Letterhead */
        .letterhead {
            background-color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .letterhead h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
            color: #333333;
        }

        .letterhead p {
            margin: 0;
            font-size: 18px;
            color: #666666;
        }

        /* Footer */
        .footer {
            background-color: #186537;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-top: auto;
        }

        .footer p {
            margin: 0;
            font-size: 14px;
            font-style: italic;
        }

        .footer img {
            height: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <section class="page">
        <!-- Navigation panel -->
        <?php include_once "components/navbars/t_nav_2.php" ?>

        <div class="content-area">

            <!-- Top bar -->
            <section class="top-bar">

                <div class="top-bar-btns">
                    <a href="#">
                        <a class="back-btn" href="<?php echo BASEURL ?>TReport/generateReport">Back</a>
                    </a>
                    <a href="#">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                    </a>
                    <a href="<?php echo  BASEURL ?>TProfile/profile">
                        <img src="<?php echo BASEURL ?>public/assets/Teacher/icons/icon_profile_black.png" alt="profile">
                    </a>
                </div>
            </section>

            <!-- Middle part for whole content -->
            <section class="mid-content">

                <!-- Title and sub title of middle part -->
                <div class="mid-title">
                    <h1>Generate Reports</h1>
                    <h6>Teacher Home/ C136-member details/Generate reports</h6>
                    <br><br>
                </div>

                <div class="container_content" id="container_content">
                    <!-- Letterhead -->
                    <div class="letterhead">
                        <h1>ABC Corporation</h1>
                        <p>123 Main Street</p>
                        <p>Anytown, USA 12345</p>
                    </div>
                    <div style="margin-top: 30px;">
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Full Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Role
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Last Access to Class
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">

                                </div>
                            </div>
                            <?php if (!empty($data[0])) { ?>
                                <div class="sponsor-list-row">
                                </div>
                                <?php foreach ($data[0] as $row) {

                                ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            Host Teacher
                                        </div>
                                        <div class="sponsor-list-item flex-1">
                                            1 second
                                        </div>
                                        <div class="sponsor-list-item flex-1">


                                        </div>

                                    </div>
                                <?php } ?>


                            <?php }  ?>
                        </div>
                    </div>

                    <br><br>
                    <!-- Footer -->
                    <div class="footer">
                        <img src="logo.png" alt="Company Logo">
                        <p>&copy; 2023 ABC Corporation. All rights reserved.</p>
                    </div>
                </div>

                <div class="text-center" style="padding:20px; display: flex; justify-content: center;">
                    <button onclick="generatePDF()" style="background-color: #186537; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Generate</button>
                </div>

        </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function generatePDF() {
        const element = document.getElementById('container_content');
        var opt = {
            margin: 1,
            filename: 'html2pdf_example.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        // Choose the element that our invoice is rendered in.
        html2pdf().set(opt).from(element).save();
    }
</script>

</html>