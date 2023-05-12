<?php

class TBilling extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function Billing1()
    {
        $res1 = $this->model('BillingModel')->getClassPayments();
        $res2 = $this->model('BillingModel')->getClassWithdraw();
        $res3 = $this->model("teacher_data")->getClasses($_SESSION['id']);
        $this->view('Teacher/Billing/Billing1', array($res1, $res2, $res3));
    }

    public function BillForm()
    {
        $this->view('Teacher/Billing/Billing2');
    }

    public function tHistory($page = 1)
    {
        $filters = $_GET;
        $limit = paginationRowLimit;
        $offset = 0;
        if ($page != 1) {
            $offset = ($page - 1) * $limit;
        }
        $rowCount = $this->model('BillingModel')->getWithdrawHistoryCount($_SESSION['id'])->count;
        $res = $this->model('BillingModel')->getTrasactionHistory($_SESSION['id']);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {
            header("location:" . BASEURL . "TBilling/tHistory");
        }
        $this->view('Teacher/Billing/transactionHistory', array($res, $pageData, $rowCount));
    }

    public function filterIncome($cid, $year, $month)
    {
        $result = $this->model("BillingModel")->getFilteredIncome($_SESSION['id'], $cid, $year, $month);
        header("Content-Type:Application/json");
        echo json_encode($result);
    }

    public function addWithdraws($amount)
    {
        $id2 = $_POST['bankName'];
        $id3 = $_POST['number'];
        $id4 = $_POST['name'];

        $message = "You have successfully withdrawn Rs. " . $amount . " from your income";
        if ($this->model('BillingModel')->addWithdraw($id2, $id3, $id4, $amount) and $this->model('notificationModel')->notify($_SESSION['id'], $message, 'tch')) {
            flashMessage("success");
            header("location:" . BASEURL . "TBilling/Billing1");
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . "TBilling/Billing1");
        }
    }

    public function analytics($cid)
    {
        $res1 = $this->model('BillingModel')->getClassMonthlyPay($cid);
        $res2 = $this->model('classModel')->getTotalSt($cid);
        $res3 = $this->model('classModel')->getTotalTr($cid);
        $res4 = $this->model('BillingModel')->geMonthtIncomeAnalyse($cid, date('Y'));
        $monthlyBillArray = $this->createEmptyMonthArray();

        foreach ($res4 as $row) {
            $date = new DateTime($row->timestamp);
            $monthName = getMonthName($date->format('n'));
            if (!array_key_exists($monthName, $monthlyBillArray)) {
                $monthlyBillArray[$monthName] = 0;
            }
            $monthlyBillArray[$monthName] += $row->amount;
        }

        $this->view('Teacher/insideClass/income', array($res1, $res2, $res3, $res4,"monthlyBillArray"=>$monthlyBillArray));
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
