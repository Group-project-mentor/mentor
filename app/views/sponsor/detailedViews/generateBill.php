<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment preview</title>
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">

            </div>
            <div class="top-bar-btns">
                <a >
                    <a class="back-btn" onclick="history.back();">Back</a>
                </a>
                <?php include_once "components/notificationIcon.php" ?>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <?php include_once "components/profilePic.php"?>
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and subtitle of middle part -->
            <div class="mid-title">
                <h1>Payment Details</h1>
                <h6>slips / payments / Slip No <?php echo $data[0]->id ?></h6>
            </div>

            <!-- * content area -->
            <div class="container-box">
                <!--                <h1 class="report-title">Payment Details </h1>-->
                <div class="sponsor-detail-cell" style="max-width: 1000px;margin: auto;" id="billContainer">
                    <div>
                        <h1 style="text-align: center;font-size: xx-large;">BILL DETAILS</h1>
                    </div>
                    <div class="details width-400-center wrap-on">
                        <div class="sponsor-list-main" style="padding: 20px;font-size: small !important;">
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    User ID :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[4]->id ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Name :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[4]->dispName ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Email :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell txt-wrap-off">
                                    <?php echo $data[4]->email ?>&nbsp;
                                </div>
                            </div>
                        </div>
                        <?php $date = explode(' ', $data[0]->timestamp ) ?>
                        <div class="sponsor-list-main" style="padding: 20px;font-size: small !important;">
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Payment ID :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[0]->paymentId ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Paid Amount :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell txt-wrap-off">
                                    <?php echo $data[0]->currency ?>&nbsp;
                                    <?php echo number_format($data[0]->amount, 2, '.', ',') ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell txt-wrap-off" >
                                    Payment Type :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $data[0]->method ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                    Date :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $date[0] ?>
                                </div>
                            </div>
                            <div class="sponsor-list-row wrap-on">
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell" >
                                    Time :
                                </div>
                                <div class="sponsor-list-item flex-1 sponsor-detail-cell dark-cell">
                                    <?php echo $date[1] ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="html2pdf__page-break"></div>
<!--                    This is the seperation -->

                    <div style="margin-top: 30px;font-size: small !important;">
                        <h2>Your payment invoice : </h2>
                        <br>
                        <div class="sponsor-list-main row-decoration">
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                    Student ID
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-3">
                                    Name
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Year
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Month
                                </div>
                                <div class="sponsor-list-item sponsor-list-item-title flex-2">
                                    Amount [LKR]
                                </div>
                            </div>
                            <?php if(empty($data[3])){ ?>
                                <div class="sponsor-list-row">
                                    <div class="sponsor-list-item flex-1">
                                        Error in this bill <?php echo !empty($data[2]->payment_id)?"(Bill no : ".$data[2]->payment_id." )":"" ?>
                                    </div>
                                </div>
                            <?php } else {
                                foreach ($data[3] as $row){
                                    ?>
                                    <div class="sponsor-list-row">
                                        <div class="sponsor-list-item flex-1">
                                            <?php echo $row->student_id ?>
                                        </div>
                                        <div class="sponsor-list-item flex-3">
                                            <?php echo $row->name ?>
                                        </div>
                                        <div class="sponsor-list-item flex-2">
                                            <?php echo $row->year ?>
                                        </div>
                                        <div class="sponsor-list-item flex-2">
                                            <?php echo getMonthName($row->month) ?>
                                        </div>
                                        <div class="sponsor-list-item flex-2 chk-amount">
                                            <?php echo number_format($row->monthlyAmount, 2, '.', '') ?>
                                        </div>
                                    </div>

                                <?php }} ?>
                            <!-- Last Row -->
                            <div class="sponsor-list-row" style="padding: 15px 0;background: rgba(65,65,65,0.92) !important;border-radius: 0 0 10px 10px;">
                                <div class="sponsor-list-item flex-1">
                                </div>
                                <div class="sponsor-list-item flex-3" style="color: #ffffff;font-size: medium;">
                                    Total Payment
                                </div>
                                <div class="sponsor-list-item flex-3">
                                </div>
                                <div class="sponsor-list-item flex-2">
                                </div>
                                <div class="sponsor-list-item flex-1">
                                </div>
                                <div class="sponsor-list-item flex-2" style="color: #ffffff;font-size: medium;" id="totalPrice">
                                    <?php echo number_format($data[1], 2, '.', '') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sp-button-set">
                    <button class="sponsor-button" id="downloadBtn">
                        Download the slip
                    </button>
                </div>

            </div>
        </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var element = document.getElementById('billContainer');
    var opt = {
        margin: 1,
        filename: 'payment_slip.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    document.getElementById('downloadBtn').onclick = () => {
        html2pdf().set(opt).from(element).save();
    }
</script>
</html>
