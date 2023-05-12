<?php

class Home extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        switch ($_SESSION['usertype']) {
            case 'st':
                $this->view('student/home/index');
                break;
            case 'rc':
                $typeCount = $this->model('resourceModel')->getTypeCount($_SESSION['id']);
                $typeCountList = array();
                foreach ($typeCount as $row) {
                    $typeCountList[$row->status] = $row->res_count;
                }
                $mySubjectCount = $this->model("resourceModel")->getMyResourcesCount($_SESSION['id']);
                $subjects = $this->model("rcHasSubjectModel")->getSubjects($_SESSION['id']);
                $chartData = $this->model("resourceModel")->getChartCounts($_SESSION['id']);
                $this->view('resourceCtr/home/index', array($subjects, $chartData, $mySubjectCount, $typeCountList));
                break;

            case 'ad':
                //$privilege=($this->model("admin")->getPrivilege($_SESSION['id'])->privilege);
                //var_dump($privilege);
                //if($privilege==1)
                //{
                   // header("location:" . BASEURL . "admins/dashboard");
                //}else if($privilege==0){
                   // header("location:" . BASEURL . "admins/coDashboard");
               // }
                header("location:" . BASEURL . "admins/dashboard");
                break;
            case 'tch':
                unset($_SESSION["cid"]);
                unset($_SESSION["cname"]);
                if (isset($_SESSION['premium_expired']) && $_SESSION['premium_expired'] == true) {
                    $this->model('premiumModel')->backToFree($_SESSION['id']);
                    unset($_SESSION["premium_expired"]);
                }
                $classes1 = $this->model("teacher_data")->getClasses($_SESSION['id']);
                $classes = $this->model("teacher_data")->getCoordinateClasses($_SESSION['id']);
                $this->view('Teacher/home/index', array($classes1, $classes));


                break;
            case 'sp':
                $totalFundingChart = $this->model("sponsorStModel")->getTotalPaidData($_SESSION['id']);
                $totalFunded = $this->model("sponsorStModel")->getTotalFundedAmount($_SESSION['id'])->total;
                $totalFunding = 0;
                foreach ($totalFundingChart as $row) {
                    $totalFunding += $row->total;
                }
                $total =$this->model("sponsorStModel")->getTotalAmount($_SESSION['id'])->total;
                $maxAmount = $this->model("sponsorStModel")->getMaxAmount($_SESSION['id'])->maxAmount;


                $monthlyChartData = $this->model("sponsorStModel")->getMonthlyData($_SESSION['id']);

                $monthlyBillData = $this->model("sponsorStModel")->getMonthlyBillData($_SESSION['id'], date('Y'));
                $monthlyBillArray = $this->createEmptyMonthArray();
                foreach ($monthlyBillData as $row) {
                    $date = new DateTime($row->timestamp);
                    $monthName = getMonthName($date->format('n'));
                    if (!array_key_exists($monthName, $monthlyBillArray)) {
                        $monthlyBillArray[$monthName] = 0;
                    }
                    $monthlyBillArray[$monthName] += $row->amount;
                }

                $this->view(
                    'sponsor/home/index',
                    array(
                        "totalFundingChart" => $totalFundingChart,
                        "stCount" => count($totalFundingChart),
                        "totalFunded" => $totalFunded,
                        "remainingAmount" => ($totalFunding - $totalFunded),
                        "monthlyAverage" => $totalFunding / (count($totalFundingChart) ? count($totalFundingChart) : 1),
                        "monthlyChartData" => $monthlyChartData,
                        "monthlyBillArray" => $monthlyBillArray,
                        "amountStatus" => array($total, $maxAmount) ,
                    )
                );
                break;
            default:
                header("location:" . BASEURL . "login");
        }
    }

    public function bmc()
    {
        $this->view('BMC');
    }

    public function saveBmc()
    {
        $count = $_POST['custom_1'];
        $name = $_POST['card_holder_name'];
        $amount = $_POST['payhere_amount'];
        $email = $_POST['custom_2'];
        $this->model("payments")->saveBMC($name, $email, $amount, $count);
    }

    public function toggle()
    {
        session_start();
        if ($_SESSION['navtog'] == 1) {
            $_SESSION['navtog'] = 0;
        } else {
            $_SESSION['navtog'] = 1;
        }
        echo "jeyy";
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }

    private function createEmptyMonthArray()
    {
        $monthArray = array();
        for ($i = 1; $i <= 12; $i++) {
            $date = DateTime::createFromFormat('!m', $i);
            $monthArray[$date->format('F')] = 0;
        }
        return $monthArray;
    }
}
