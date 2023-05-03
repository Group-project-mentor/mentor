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

    public function transHistory()
    {
        $this->view('Teacher/Billing/transactionHistory');
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
            header("location:" . BASEURL . "TBilling/Billing1");
        } else {
            header("location:" . BASEURL . "TBilling/Billing1");
        }
    }
}
