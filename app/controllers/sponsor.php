<?php

class Sponsor extends Controller
{
    private string $user = "sp";
    private string $table1 = "sponsorStModel";
    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index(){

    }

    public function allStudents($page = 1){
        $limit = paginationRowLimit;
        $offset = 0;
        if($page != 1){
            $offset = ($page - 1) * $limit;
        }
        $rowCount = $this->model($this->table1)->getSponsorStudentsCount($_SESSION['id'])->count;
        $res = $this->model($this->table1)->getSponsorStudents($_SESSION['id'], $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if($page < 1 || $page > $pageData[1]){
            header("location:".BASEURL."sponsor/allsStudents");
        }
        $this->view('sponsor/student_progress/student_report',array($res,$pageData));
    }

    public function getStudents($search){
        if (empty($search)){
            return $this->model($this->table1)->getSponsorStudents($_SESSION['id']);
        }
        else{
            $result = $this->model($this->table1)->getSponsorStudentsSearch($_SESSION['id'],$search);
            echo json_encode($result);
        }
    }

    public function new_student($search = null){
        $approvedStudents = $this->getNewStudents($search);
        $this->view('sponsor/student_progress/new_student',array($approvedStudents));
    }

    public function getNewStudents($search){
        if (empty($search)){
            return $this->model($this->table1)->getApprovedStudents();
        }
        else{
            $result = $this->model($this->table1)->getApprovedStudentsSearch($search);
            echo json_encode($result);
        }
    }

    public function see_student($id){
        $data = $this->model("sponsorStModel")->getStudentDetails($id);
        $subjects = $this->model("sponsorStModel")->getSubjectDetails($id);
        $grades = $this->model("sponsorStModel")->getGradeDetails($id);
        // $payments = $this->model("sponsorStModel")->getPayments($id);
        $paidPayments = $this->model("sponsorStModel")->getPaymentsPaid($id)->count;
        $remaining_count = $data->fundMonths - $paidPayments;

        $this->view('sponsor/student_progress/see_student',array($data,$subjects,$grades, $remaining_count));
    }

//    ? Used transaction in this
    public function connectSponsorStudent($st_id){
        $this->model($this->table1)->transaction();
         try{
            if ($this->model($this->table1)->isStudentStatus($st_id,"AP")){
                if($this->model($this->table1)->connectSponsor($st_id,$_SESSION['id'])){
                    flashMessage("Student Added!");
                    $displayName = $this->model($this->table1)->getMyData($_SESSION['id'])->dispName;
                    $notifyMsg = "Congratulations! Sponsor $displayName added you for funding !";
                    $this->notify($st_id,$notifyMsg,"SP");
                }else{
                    flashMessage("unsuccessful");
                }
            }else{
                flashMessage("unsuccessful");
            }
            $this->model($this->table1)->commit();

            header("location:".BASEURL."sponsor/new_student");
         }catch (Exception $e){
             $this->model($this->table1)->rollback();
         }

    }

//    * Profile part Starts

    public function profile(){
        $result = $this->model("userModel")->getSponsorData($_SESSION['id']);
        $this->view('sponsor/profile/sp_profile',array($result));
    }

    public function editProfile($infoType){
        switch ($infoType) {
            case 'image':
                $this->image();
                break;
            case 'name':
                $this->name();
                break;
            case 'mobile':
                $this->mobile();
                break;
            case 'password':
                $this->password();
                break;
            case 'email':
                $this->email();
                break;
            case 'others':
                $this->others();
                break;
            default:
                header("location:" . BASEURL . "rcProfile");
                break;
        }
    }

    private function image(){
        $result = $this->model("userModel")->getImage($_SESSION['id']);
        $this->view("sponsor/profile/sp_change_image", $result);
    }

    private function email(){

    }

    private function mobile(){
        $result = $this->model("userModel")->getOptSponsorDetails($_SESSION['id']);
        $this->view("sponsor/profile/sp_change_mobile", array($result));
    }

    private function name(){
        $result = $this->model('userModel')->getOptSponsorDetails($_SESSION['id']);
        $this->view("sponsor/profile/sp_change_name",array($result));
    }

    private function password(){
        $this->view("sponsor/profile/sp_change_passwd");
    }
    
    // ! Not using now
    public function changeImage(){
        if (isset($_POST['image'])) {
            if($this->model("userModel")->changeImg($_SESSION['id'],$_POST['image'])){
                echo "success";
            }else{
                echo "unsuccess";
            }
        }
    }

    public function updateImage()
    {
        if (isset($_FILES["image"])) {
            $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg");
            $fileData = array("name" => $_FILES["image"]["name"],
                    "type" => $_FILES["image"]["type"],
                    "size" => $_FILES["image"]["size"]);
            $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
            if (in_array($fileData['type'], $typeArray)) {
                $newFileName = uniqid() . $_SESSION["id"] . "." . $extention;
                $image = $this->model("userModel")->getImage($_SESSION['id'])[0];
                if(empty($image) or $image == ""){
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "data/profiles/" . $newFileName)) {
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    } else {
                        echo "failed";
                    }
                }else{
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "data/profiles/" . $newFileName) and file_exists("data/profiles/".$image) and unlink("data/profiles/".$image)) {
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }elseif(!file_exists("data/profiles/".$image)){
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                     else {
                        echo "failed";
                    }
                }
            }else{
                echo "type_error";
            }     
        }else{
            echo "failed";
        }
    }

    public function changeName(){
        if (isset($_POST['name']) && isset($_POST['dispName'])) {
            if ((preg_match('/[a-zA-Z][a-zA-Z ]+/',$_POST['name']))) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id'], $_POST['dispName']);
                $_SESSION['name'] = $_POST['name'];
                flashMessage("success");
                header("location:" . BASEURL . 'sponsor/profile');
            } else {
                flashMessage("wrongName");
                header("location:" . BASEURL . 'sponsor/editProfile/name');
            }
        } else {
            flashMessage("Error");
            header("location:" . BASEURL . 'sponsor/editProfile/name');
        }
    }

    public function changeMobile(){
        if (isset($_POST['mobile'])) {
            if ((preg_match('/[0-9]{10}/',$_POST['mobile'])) && ($_POST['mobile'] != '')) {
                $this->model("userModel")->updateMobile($_POST['mobile'], $_SESSION['id'],"sponsor");
                flashMessage("success");
                header("location:" . BASEURL . 'sponsor/profile');
            } else {
                flashMessage("wrongName");
                header("location:" . BASEURL . 'sponsor/editProfile/mobile');
            }
        } else {
            flashMessage("Error");
            header("location:" . BASEURL . 'sponsor/editProfile/mobile');
        }
    }

    public function changeOther(){
        if (isset($_POST['desc'])) {
        //            if ((preg_match('/^[A-Za-z0-9.]+$/',$_POST['desc'])) && ($_POST['desc'] != '')) {
                $this->model("userModel")->updateOthers($_POST['desc'], $_SESSION['id']);
                flashMessage("success");
                header("location:" . BASEURL . 'sponsor/profile');
        //            } else {
        //                flashMessage("wrongName");
        //                header("location:" . BASEURL . 'sponsor/editProfile/other');
        //            }
        } else {
            flashMessage("Error");
            header("location:" . BASEURL . 'sponsor/editProfile/others');
        }
    }

    private function others(){
        $result = $this->model('userModel')->getOptSponsorDetails($_SESSION['id']);
        $this->view("sponsor/profile/sp_change_others",array($result));
    }

//    * Profile part Ends

    public function reportIssue(){
        $result = $this->model("reportIssue")->getReportTypes($_SESSION['usertype']);
        $this->view('sponsor/reportIssue/report',array($result));
    }

    public function saveReport(){
        $response = array("alert"=>"","message"=>"");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['reportOptions'] == "0" or empty($_POST['reportDesc'])){
                $response['alert'] = "fill all";
            }else{
                if($this->model('reportIssue')->saveIssue($_SESSION['id'], $_POST['reportOptions'], $_POST['reportDesc'])){
                    $response['message'] = "success";
                }else{
                    $response['message'] = "failed";
                }
            }
        }
        // header('Content-Type:application/json');
        echo json_encode($response);
        $this->notify($_SESSION['id'], "Your issue has been reported successfully. We will fix the issue soon.","report");
    }

    public function transactionHistory($page = 1){
            $filters = removeMainURL($_GET);
            $limit = paginationRowLimit;
            $offset = 0;
            if($page != 1){
                $offset = ($page - 1) * $limit;
            }
            $rowCount = $this->model('payments')->getTrasactionHistoryCount($_SESSION['id'],$filters)->count;
            $res = $this->model('payments')->getTrasactionHistory($_SESSION['id'],$offset,$limit,$filters);
            $pageData = array($page,ceil($rowCount/$limit));
            if($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)){
                header("location:".BASEURL."sponsor/transactionHistory");
            }
            $this->view('sponsor/payments/transactionHistory',array($res,$pageData,$rowCount));
    }

    public function paymentsInProgress(){
        $rowArray = array();
        $month = intval(date('m'));
        $year = intval(date('Y'));
        $billData = $this->model($this->table1)->getBillNo($_SESSION['id']);
        //        var_dump($year,$month);
        $sponsorships = $this->model($this->table1)->getSponsorship($_SESSION['id']); //! student_id, month, year, fundMonths, monthlyAmount, , fundMonths, approved_date

        //        ? check if sponsor has/not students assigned
        if(!empty($sponsorships)){

        //        ? loop through that data
            foreach ($sponsorships as $row){
                $acceptedDate = explode("-",$row->approved_date);
                $accMonth = intval($acceptedDate[1]);
                $accYear = intval($acceptedDate[0]);
                $fundMonths = $row->fundMonths;


                // ? get the last paid month of each student
                $payments = $this->model($this->table1)->getPayments($row->id); //! student_id, month, year

                if (!empty($payments)) {
                    if ($fundMonths > 0){
                        $timeArray = array();

                        foreach ($payments as $payment){
                            $payDate = $payment->year."-".$payment->month;
                            $timeArray[] = $payDate;
        //                    var_dump(in_array($payDate,$timeArray));
                        }

                        if ($year == $accYear){
                            for ($i=$accMonth;$i<=$month;$i++){
                                $thisDate = $year."-".$i;
                                if(!in_array($thisDate,$timeArray)){
                                    $rowArray[] = array(
                                        "student_id"=>$row->id,
                                        "name" => $row->name,
                                        "year" => $year,
                                        "month" => $i,
                                        "amount" => $row->monthlyAmount
                                    );
                                }
                                $fundMonths --;
                                if ($fundMonths <= 0){
                                    break;
                                }

                            }
                        }else {
                            for ($i = $accMonth; $i <= 12; $i++) {
                                $thisDate = $accYear . "-" . $i;
                                if (!in_array($thisDate, $timeArray)) {
                                    $rowArray[] = array(
                                        "student_id" => $row->id,
                                        "name" => $row->name,
                                        "year" => $accYear,
                                        "month" => $i,
                                        "amount" => $row->monthlyAmount
                                    );
                                }
                                $fundMonths -= 1;
                                if ($fundMonths <= 0){
                                    break;
                                }
                            }
                            if ($fundMonths > 0){
                                for ($i = 1; $i <= $month; $i++) {
                                    $thisDate = $year . "-" . $i;
                                    if (!in_array($thisDate, $timeArray)) {
                                        $rowArray[] = array(
                                            "student_id" => $row->id,
                                            "name" => $row->name,
                                            "year" => $year,
                                            "month" => $i,
                                            "amount" => $row->monthlyAmount
                                        );
                                    }
                                    $fundMonths --;
                                    if ($fundMonths <= 0){
                                        break;
                                    }
                                }
                            }

                        }
                    }

                    //? If no paid any payment until assigned that student
                } else{

                    if($accYear < $year and $row->fundMonths > 0){
                        for ($i = $accMonth ; $i <= 12; $i++){
                            $rowArray[] = array(
                                "student_id"=>$row->id,
                                "name" => $row->name,
                                "year" => $accYear,
                                "month" => $i,
                                "amount" => $row->monthlyAmount
                            );
                            $fundMonths --;
                            if ($fundMonths <= 0){
                                break;
                            }
                        }
                        if ($fundMonths > 0) {
                            for ($i = 1; $i <= $month; $i++) {
                                $rowArray[] = array(
                                    "student_id" => $row->id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                                $fundMonths--;
                                if ($fundMonths <= 0) {
                                    break;
                                }
                            }
                        }
                    }
                    elseif($accYear == $year){
                        if ($accMonth <= $month and ($row->fundMonths > 0)){
                            for ($i = $accMonth; $i <= $month; $i++){
                                $rowArray[] = array(
                                    "student_id"=>$row->id,
                                    "name" => $row->name,
                                    "year" => $year,
                                    "month" => $i,
                                    "amount" => $row->monthlyAmount
                                );
                                $fundMonths--;
                                if ($fundMonths <= 0) {
                                    break;
                                }
                            }
                        }
                    }
                }
            }
        }
        $this->view('sponsor/payments/paymentsInProgress',array($rowArray,$sponsorships,$billData));
    }

    public function paymentTest($bill_id){
        $billData = $this->model($this->table1)->getBillData($bill_id);
        $totalPayment = 0;
        foreach ($billData as $row){
            $totalPayment += $row->monthlyAmount;
        }
        $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
        $this->view('sponsor/payments/paymentForm2',array($res,$bill_id,$totalPayment));
    }

    public function paymentDone(){
        $this->view('sponsor/payments/paymentDone');
    }

    public function paymentError(){
        $this->view('sponsor/payments/paymentError');
    }

    public function paymentDetails(){
        $res = $this->model("payments")->hasPaymentDetails($_SESSION['id']);
        $this->view('sponsor/profile/getPaymentDetails',array($res));
    }

    public function details($method){
        if($method == "update"){
            $res = $this->model("payments")
                ->updatePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
            flashMessage("Successfully Updated!");
        }
        elseif ($method == "add"){
            $res = $this->model("payments")
                ->savePaymentDetails($_SESSION['id'],$_POST['fName'],$_POST['lName'],$_POST['email'],$_POST['telNo'],$_POST['address'],$_POST['city'],$_POST['country']);
            flashMessage("Successfully Added!");
        }
        else{
            flashMessage("invalid operation");
        }
        header("location:".BASEURL."sponsor/profile");
    }

    public function createBill(){
        //        echo "hllo";
        $id = getUnique($_SESSION['id']);
        $currency = $_POST['currency'];
        $amount = $_POST['amount'];
        $response = array();
        
        if(empty($this->model($this->table1)->checkNotPaidBill($_SESSION['id']))){
            if($this->model($this->table1)->addBill($id, $currency, $amount, $_SESSION['id'])){
                $response['status'] = 1;
                $response['message'] = "Bill created successfully !";
                $response['billNo'] = $id;
            }else{
                $response['status'] = 0;
                $response['message'] = "Error in creating the bill !";
            }
        }else{
            $response['status'] = 0;
            $response['message'] = "Another unpaid bill already exist !";
        }
        echo json_encode($response);
    }

    public function insertBillData(){
        $month = $_POST['month'];
        $year = $_POST['year'];
        $billNo = $_POST['billNo'];
        $student_id = $_POST['student_id'];

        $response = array();
        $res = $this->model($this->table1)->insertBillRow($student_id,  $year, $month, $billNo);
        if($res){
            $response['status'] = 1;
        }else{
            $response['status'] = 0;
        }
        echo json_encode($response);
    }

    public function deleteBillData($bill_id){
        if($this->model('sponsorStModel')->deleteBill($bill_id,$_SESSION['id'])){
            flashMessage("Deleted");
        }else{
            flashMessage("Not Deleted");
        }
        header("location:".BASEURL."sponsor/paymentsInProgress");
    }

    public function slips($viewType, $id){
        switch ($viewType){
            case "payments":
                $bill = $this->model($this->table1)->getPayBill($id);
                $result =$this->model($this->table1)->getPaymentDetails($id);
                $this->view("sponsor/detailedViews/paymentView",array($result,$bill,$id));
                break;
            case "bills":
                $billDetails =$this->model($this->table1)->getBillDetails($id,$_SESSION['id']);
                $billContent = $this->model($this->table1)->getBillData($id);
                $total = 0;
                foreach ($billContent as $one){
                    $total += $one->monthlyAmount;
                }
                $this->view("sponsor/detailedViews/billView",array($billDetails,$billContent,$total));
                break;
            default:
                break;
        }
    }

    public function printBill($id){
        $userData = $this->model("userModel")->getSponsorData($_SESSION['id']);
        $bill = $this->model($this->table1)->getPayBill($id)->id;
        $result =$this->model($this->table1)->getPaymentDetails($id);
        $billDetails =$this->model($this->table1)->getBillDetails($bill ,$_SESSION['id']);
        $billContent = $this->model($this->table1)->getBillData($bill);
        $total = 0;
        foreach ($billContent as $one){
            $total += $one->monthlyAmount;
        }

        $this->view("sponsor/detailedViews/generateBill",array($result, $total, $billDetails, $billContent, $userData));
    }

    public function payAllMoths($student_id){
        $studentDetails = $this->model('sponsorStModel')->getStudentDetails($student_id);
        $payments = $this->model('sponsorStModel')->getPayments($student_id);

        $fundMonths = $studentDetails->fundMonths;
        $fund = $studentDetails->monthlyAmount;

        $acceptedDate = explode("-",$studentDetails->approved_date);
        $accMonth = intval($acceptedDate[1]);
        $accYear = intval($acceptedDate[0]);
        $newArry = array();
        $total = 0;

            if ($fundMonths > 0){
                $timeArray = array();

                foreach ($payments as $payment){
                    $payDate = $payment->year."-".$payment->month;
                    $timeArray[] = $payDate;
                    // var_dump(in_array($payDate,$timeArray));
                }

                $month = $accMonth;
                $year = $accYear;

                for($i = 1; $i <= $fundMonths; $i++){
                    $payDate = $year."-".$month;
                    if (!in_array($payDate,$timeArray)){
                        $newArry[] = $payDate;
                        $total += $fund;
                    }
                    $month = $accMonth + $i;
                    $year = $accYear;
                    if ($month > 12){
                        $month = $month - 12;
                        $year = $year + 1;
                    }
                }

                $billID = getUnique($_SESSION['id']);
                $currency = "LKR";
                
                if($this->model('sponsorStModel')->addBill($billID, $currency, $total, $_SESSION['id'])){
                    $flag = 1;
                    foreach ($newArry as $item){
                        $yearMonth = explode("-",$item);
                        if($this->model('sponsorStModel')->insertBillRow($student_id, $yearMonth[0], $yearMonth[1], $billID)){
                            $flag *= 1;
                        }else{
                            $flag *= 0;
                        }
                    }
                    if($flag == 1){
                        flashMessage("success");
                        header("location:".BASEURL."sponsor/slips/bills/".$billID);
                    }else{
                        flashMessage("failed");
                        header("location:".BASEURL."sponsor/allStudents");
                    }
                }else{
                    flashMessage("failed");
                    header("location:" . BASEURL . "sponsor/allStudents");
                }              
                            
            }else{
                flashMessage("no_pay");
                header("location:" . BASEURL . "sponsor/allStudents");
            }
    }
}