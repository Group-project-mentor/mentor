<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo BASEURL ?>assets/mentor.ico">
    <title>Payments in Progress</title>
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_main.css">
    <link rel="stylesheet" href="<?php echo BASEURL?>public/stylesheets/resourceCreator/rc_resources.css">
    <link rel="stylesheet" href="<?php echo BASEURL . '/public/stylesheets/sponsor/sp_styles.css' ?> ">
    <script defer src="<?php echo BASEURL ?>javascripts/spPaymentProgress.js"> </script>

</head>

<body>
<section class="page">
    <!-- Navigation panel -->
    <?php include_once "components/navbars/sp_nav_1.php"?>

    <div class="content-area">

        <!-- Top bar -->
        <section class="top-bar">
            <div class="search-bar">
                <input type="text" name="" id="" placeholder="Search...">
                <a href="">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_search.png" alt="">
                </a>
            </div>
            <div class="top-bar-btns">
<!--                <a href="#">-->
<!--                    <a class="back-btn" href="--><?php //echo BASEURL ?><!--privateclass/billing">Back</a>-->
<!--                </a>-->
                <a href="#">
                    <img src="<?php echo BASEURL?>public/assets/Teacher/icons/icon_notify.png" alt="notify">
                </a>
                <a href="<?php echo  BASEURL ?>sponsor/profile">
                    <img src="<?php echo BASEURL?>public/assets/icons/icon_profile_black.png" alt="profile">
                </a>
            </div>
        </section>

        <!-- Middle part for whole content -->
        <section class="mid-content">

            <!-- Title and sub title of middle part -->
            <div class="mid-title">
                <h1>Payments in Progress</h1>
                <h6> Billing / Payments in progress</h6>
            </div>

            <!-- Grade choosing interface -->
            <div class="container-box">
                <div style="margin-top: 20px;display: flex;justify-content: space-between;">
                    <div class="rc-resource-header">
                        <h3>Pay your remaining payment :  </h3>
                    </div>
                    <a href="<?php echo BASEURL?>sponsor/transactionHistory" type="button" class="sponsor-button"  style="font-size: large;margin: 0 5px;text-decoration: none;display: flex;align-items: center;">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_cash.png" alt="profile" style="width: 25px;">
                        Transaction History
                    </a>
                </div>
                <div style="margin-top: 30px;">
                    <div class="sponsor-list-main row-decoration">
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1" style="display:flex;flex-direction: column;align-items: center;justify-content: center;">
                                <label style="font-size: smaller;margin-bottom: 10px;">all</label>
                                <input id="chkAll" type="checkbox" class="save-info-check-main">
                            </div>
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
                        <?php if(empty($data[0])){ ?>
                            <div class="sponsor-list-row">
                                <div class="sponsor-list-item flex-1">
                                    NO DATA TO SHOW
                                </div>
                            </div>
                        <?php } else {
                            foreach ($data[0] as $row){
                        ?>
                        <div class="sponsor-list-row">
                            <div class="sponsor-list-item sponsor-list-item-title flex-1">
                                <input type="checkbox"  class="save-info-check" >
                            </div>
                            <div class="sponsor-list-item flex-1 chk-ids">
                                <?php echo $row["student_id"] ?>
                            </div>
                            <div class="sponsor-list-item flex-3 chk-names">
                                <?php echo $row["name"] ?>
                            </div>
                            <div class="sponsor-list-item flex-2 chk-years">
                                <?php echo $row["year"] ?>
                            </div>
                            <div class="sponsor-list-item flex-2 chk-months">
                                <?php echo getMonthName($row["month"]) ?>
                            </div>
                            <div class="sponsor-list-item flex-2 chk-amount">
                                <?php echo number_format($row['amount'], 2, '.', '') ?>
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
                                0
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px;display: flex;justify-content: flex-end;">
                    <button  class="sponsor-button"  style="font-size:large;margin: 0 5px;text-decoration: none;" id="bill-btn">
                        <img src="<?php echo BASEURL?>public/assets/icons/icon_addBill.png" alt="profile" style="width: 25px;">
                        Add to bill
                    </button>
                </div>

            </div>
    </div>
</section>
</body>
<script>
    const BASEURL = "<?php echo BASEURL ?>";
    let billBtn = document.getElementById('bill-btn');
    let bill = "";
    billBtn.addEventListener('click',(e)=>{
        e.preventDefault();

        let dataArray = [];
        let formData = new FormData();

        formData.append("currency","LKR");
        formData.append("amount",totalSum);

        fetch(`${BASEURL}sponsor/createBill`,{
            method : "post",
            body : formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                if(data.billNo !== undefined){
                    bill = data.billNo;
                    let completed = 0;
                    for (let i =0; i < chkList.length;i++){
                        if (chkList[i].checked){
                            let form = new FormData();

                            form.append('student_id',ids[i].innerHTML.trim());
                            form.append('month', `${monthToNumber(months[i].innerHTML.trim())}`);
                            form.append('year', years[i].innerHTML.trim());
                            form.append('billNo', bill);

                            fetch(`${BASEURL}sponsor/insertBillData`,{
                                method:"post",
                                body:form
                            })
                                .then(res => res.json())
                                .then(data => {
                                    console.log(data);
                                    if(data.status){
                                        completed++;
                                    }
                                })
                            // dataArray.push(form);
                        }
                    }
                    totalSum = 0;
                    location.href = BASEURL+"sponsor/slips/bills/"+bill;
                }else{
                    console.log("No bill number !");
                }
            })
            .catch(err => console.log(err));



    })
</script>
</html>