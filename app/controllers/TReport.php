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
}

?>