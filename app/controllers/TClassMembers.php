<?php

class TClassMembers extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function changeHost(){
        $this->view('Teacher/classMembers/changeHost');
    }   

    public function changeHost2(){
        $this->view('Teacher/classMembers/changeHost2');
    }  

    public function changeHost3(){
        $this->view('Teacher/classMembers/changeHost3');
    }   

    public function memDetails($class_id)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getClass($class_id);
        $_SESSION["cid"]=$class_id;
        $res1 = $this->model('teacher_data')->getStudents($class_id);
        $res2 = $this->model('teacher_data')->getTeachers($class_id);
        $res3 = $this->model('teacher_data')->getHostTeacher($class_id);
        
        $premium=($this->model("premiumModel")->getPremium($_SESSION['id'])->active);
        
        if($premium==1)
        {
            $this->view('Teacher/classMembers/membersDetails',array($res1,$res2,$res3));
        }
        else
        {
            $this->view('Teacher/classMembers/memberDetailsFree',array($res1,$res2,$res3));
        }
        
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function rmvSt($student_id,$class_id)
    {
       
            $this->model("teacher_data")->deleteSt($student_id,$class_id);
                header("location:" . BASEURL . "TClassMembers/memDetails/" . $_SESSION["cid"]);
            
        
    }

    public function rmvTch($teacher_id,$class_id)
    {
       
            $this->model("teacher_data")->deleteTch($teacher_id,$class_id);
                header("location:" . BASEURL . "TClassMembers/memDetails/" . $_SESSION["cid"]);
            
        
    }


    public function restrictSt(){
        $this->view('Teacher/classMembers/restrictStudent');
    }
}


?>
