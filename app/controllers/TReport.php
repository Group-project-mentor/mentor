<?php

class TReport extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function generateReport(){
        $this->view('Teacher/report/generateReport');
    }   

    public function generate($class_id){
        $this->getClass($class_id);
        $_SESSION["cid"]=$class_id;
        $res3 = $this->model('teacher_data')->getHostTeacher($class_id);
        $this->view('Teacher/report/report',array($res3));
    } 

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function ReportRequest($cid){
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $id2 = $_POST['report_category'];
        $id1 = $_POST['student_id'];
        switch ($id2){
            case 1:
                $res=$this->model('TReportModel')->getAnalyse1($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            case 2:
                $res=$this->model('TReportModel')->getAnalyse2($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            case 3:
                $res=$this->model('TReportModel')->getAnalyse3($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            case 4:
                $res=$this->model('TReportModel')->getAnalyse4($id1);
                $this->view('Teacher/report/report', array($res));
                break;
            default:
                header("location:" . BASEURL . "TReport/generateReport");

        }
    } 
}

?>