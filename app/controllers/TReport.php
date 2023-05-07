<?php

class TReport extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function generateReport()
    {
        $this->view('Teacher/report/generateReport');
    }


    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function ReportRequest($cid,$id1,$id2)
    {
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        //$id2 = $_POST['report_category'];
       // $id1 = $_POST['student_id'];
    
        switch ($id2) {
            case 1:
                $res = $this->model('TReportModel')->getAnalyse1($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/report', array($res));
                break;
            case 2:
                $res = $this->model('TReportModel')->getAnalyse2($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            case 3:
                $res = $this->model('TReportModel')->getAnalyse3($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            case 4:
                $res = $this->model('TReportModel')->getAnalyse4($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            default:
                header("location:" . BASEURL . "TReport/generateReport");
        }
    }

    public function AskFeedback($cid)
    {
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $id2 = $_POST['report_category'];
        $id1 = $_POST['student_id'];

        if(isset($id1) && !empty($id1) && isset($id2) && !empty($id2)){
        $_SESSION['Rcategory']=$id2;
        $_SESSION['sid']=$id1;
    }
    
        switch ($id2) {
            case 1:
                $res = $this->model('TReportModel')->getAnalyse1($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 2:
                $res = $this->model('TReportModel')->getAnalyse2($id1);
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 3:
                $res = $this->model('TReportModel')->getAnalyse3($id1);
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 4:
                $res = $this->model('TReportModel')->getAnalyse4($id1);
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            default:
                header("location:" . BASEURL . "TReport/generateReport");
        }
    }
}
