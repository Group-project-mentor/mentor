<?php

class TPrivileges extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function p1MemberDetails($class_id){
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getClass($class_id);
        $_SESSION["cid"]=$class_id;
        $res1 = $this->model('teacher_data')->getStudents($class_id);
        $res2 = $this->model('teacher_data')->getTeachers($class_id);
        $res3 = $this->model('teacher_data')->getHostTeacher($class_id);
        $this->view('Teacher/TPrivilege1/memberDetailsP1',array($res1,$res2,$res3));
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function p1AddSt(){
        $this->view('Teacher/TPrivilege1/addStudentP1');
    }  

    public function p1CreateAction(){
        $cid=$_SESSION['cid'];
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        if($this->model('teacher_data')->addStudentsClass($l_id) ){
            
            header("Location: " . BASEURL . "TPrivileges/p1MemberDetails/" . $cid);

        }
        else{
            header("location:".BASEURL."TInsideClass/addSt");
        }

    }

    public function p2MemberDetails($class_id){
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getClass($class_id);
        $_SESSION["cid"]=$class_id;
        $res1 = $this->model('teacher_data')->getStudents($class_id);
        $res2 = $this->model('teacher_data')->getTeachers($class_id);
        $res3 = $this->model('teacher_data')->getHostTeacher($class_id);
        $this->view('Teacher/TPrivilege2/memberDetailsP2',array($res1,$res2,$res3));
    }

    public function p2AddSt(){
        $this->view('Teacher/TPrivilege1/addStudentP1');
    }  

    public function p2CreateAction(){
        $cid=$_SESSION['cid'];
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        if($this->model('teacher_data')->addStudentsClass($l_id) ){
            
            header("Location: " . BASEURL . "TPrivileges/p2MemberDetails/" . $cid);

        }
        else{
            header("location:".BASEURL."TInsideClass/addSt");
        }

    }

    public function p2RmvSt($student_id,$class_id)
    {
       
            $this->model("teacher_data")->deleteSt($student_id,$class_id);
                header("location:" . BASEURL . "TClassMembers/memDetails/" . $_SESSION["cid"]);
            
        
    }

}
